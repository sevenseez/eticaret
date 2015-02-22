<?php

class Checkout extends EMongoDocument
    {
      public $products;
      public $user_id;
      public $date;
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
        return 'Checkouts';
      }
      
   
      public function rules()
      {
        return array(
       array('user_id, products, date','required')
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
          'product_id' => 'Ürün ID',
          'user_id'=>'Kullanıcı ID',
          'date'=>'Tarih'
        );
      }
      
         public function indexes()
    {
        return array(
            // index name is not important, you may write whatever you want, just must be unique
            'index1_name'=>array(
                'key'=>array(
                    'user_id'=>EMongoCriteria::SORT_ASC
                )
            ),
        );
    } 
       public function primaryKey()
    {
        return '_id'; // Model field name, by default the _id field is used
    }

    
    public function getTotal($provider){
        
        $totalValue = 0;
        $totalFee = 0;
        foreach($provider as $item){
                $totalValue+=$item['quantity']*$item['product_price'];
                $totalFee+=2*$item['quantity'];
        }
        return array($totalValue,$totalFee);

        
        
    }
    public function CheckoutDataProvider() {
       
        $products = $this->findAllByAttributes(array('user_id'=>Yii::app()->user->id));
        $resultArray = array();
        foreach($products as $p){
            $count=count($p->products);
            for($i=0;$i<$count;$i++){
                $resultArray[]=$p->products[$i];
            }
        }
       return new CArrayDataProvider($resultArray,
                array(
                    'keyField'=>'product_id',
                    'pagination'=>array('pageSize'=>'5'))
         );
        
        
    }
    
} 

     