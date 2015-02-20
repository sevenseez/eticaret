<?php

class Cart extends EMongoDocument
    {
      public $products;
      public $user_id;
      /*
      public $product_id;
      public $quantity;
      public $product_name;
      public $image;
      public $price;
      public $description;
 */
      
      // This has to be defined in every model, this is same as with standard Yii ActiveRecord
      public static function model($className=__CLASS__)
      {
        return parent::model($className);
      }
 
      // This method is required!
      public function getCollectionName()
      {
        return 'Carts';
      }
      
   
      public function rules()
      {
        return array(
       
        );
      }
      
    public function relations()
    {
            // NOTE: you may need to adjust the relation name and the related
            // class name for the relations automatically generated below.
            return array(
              
            );
    }
 
      public function getAttributeLabels()
      {
        return array(
          'product_id' => 'Product ID',
          'user_id'=>'User ID',
        );
      }
      
         public function indexes()
    {
        return array(
            // index name is not important, you may write whatever you want, just must be unique
            'index1_name'=>array(
                'key'=>array(
                    'user_id'=>EMongoCriteria::SORT_ASC
                ),
            'unique'=>true,
            ),
        );
    } 
       public function primaryKey()
    {
        return '_id'; // Model field name, by default the _id field is used
    }
    
    public function InsertCart($pArray) {
        
      
        $product_name =  $pArray['product_name'];
        $product_image = $pArray['image'];
        $product_price = $pArray['price'];
        $product_id = $pArray['_id']['$id'];
        $user_id = Yii::app()->user->id;
       
        $product = array(
            "product_id"=>$product_id,
            "product_name"=>$product_name,
            "product_price"=>$product_price,
            "product_image"=>$product_image
                );
        
        $mongo = Yii::app()->mongodb->getConnection();
        $db = $mongo->selectDB('eTicaretDatabase');
        $collection = $db->selectCollection('Carts');
      
       if ($collection->find(array("user_id"=>$user_id))->count()>0){
           
           $criteria = array("user_id"=>$user_id,
               "products.product_id"=>$product_id
               );
           $result = $collection->find($criteria);
           $resultArray = iterator_to_array($result);
           
           if (count($resultArray)>0){
               
               foreach($result as $r){
                   $pr = $r['products'];
                   break;
                }
                
                if (count($pr) == count($pr, COUNT_RECURSIVE)) 
                {
                  $quant = $pr['quantity']+1;
                }
                else
                {
                   foreach($pr as $pp){
                    if($pp['product_id']==$product_id)
                     {
                      $quant = $pp['quantity']+1; 
                      break;
                     }
                   }
                }
                $product = array_merge($product,array('quantity'=>$quant)); 
                $collection->update( 
                $criteria,
                array('$set' => array("products.$" => $product))
              );
                echo 'Quantity increased for specific product';
           }
           else {
            $product = array_merge($product,array('quantity'=>1));
            $collection->update( 
            array("user_id" => $user_id),
            array('$push' => array("products" => $product))
          );
            echo 'INSERTED to existed user';
           }    
       }
       else {
            $product = array_merge($product,array('quantity'=>1));
            $collection->insert( 
            array("user_id" => $user_id,
                "products" => [$product])
          );
            echo 'INSERTED to new user';
       }
       return true;
       
    }
    
    public function CartDataProvider() {
       
      
       
        $products = $this->findByAttributes(array('user_id'=>Yii::app()->user->id))->products;
        
       return new CArrayDataProvider($products,
                array(
                    'keyField'=>'product_id',
                    'pagination'=>array('pageSize'=>'5'))
         );
        
        
        
    }
    
} 

     