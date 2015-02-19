<?php

class Cart extends EMongoDocument
    {
      public $products;
      public $user_id;
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
    
    public function InsertCart($p_id) {
        
        $user_id = Yii::app()->user->id;
        $mongo = Yii::app()->mongodb->getConnection();
        $db = $mongo->selectDB('eTicaretDatabase');
        $collection = $db->selectCollection('Carts');
      
       if ($collection->find(array('user_id'=>$user_id))->count()>0){
           
           $product = $p_id;
            $collection->update( 
            array("user_id" => $user_id),
            array('$push' => array("products" => $product))
          );
            
       }
       else {
           
             $collection->insert( 
            array("user_id" => $user_id,
                 "products" => array($p_id))
          );
           
           
       }
       return true;
       
    }
    
    public function CartDataProvider() {
       
      
       
        $products = $this->findByAttributes(array('user_id'=>Yii::app()->user->id))->products;
           
        $ProductModel = new ProductDetail();
        $criteria = new EMongoCriteria();
        $criteria->product_id('in',$products);
        
       return new EMongoDocumentDataProvider($ProductModel,
                array('criteria'=>$criteria,
                    'pagination'=>array('pageSize'=>'5'))
         );
        
        
        
    }
    
} 

     