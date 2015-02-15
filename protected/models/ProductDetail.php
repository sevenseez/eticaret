<?php

class ProductDetail extends EMongoDocument
    {
      public $product_id;
      public $product_name;
      public $category_id;
      public $brand_id;
      public $images;
      public $price;
      public $description;
      public $availability;
      public $state;
      public $quantity;
      public $star;
      public $tag;
      public $comments;

 
      // This has to be defined in every model, this is same as with standard Yii ActiveRecord
      public static function model($className=__CLASS__)
      {
        return parent::model($className);
      }
 
      // This method is required!
      public function getCollectionName()
      {
        return 'ProductDetails';
      }
      
   
      public function rules()
      {
        return array(
          array('product_id, category_id, brand_id, product_name','required','message'=>'Bu alan boş bırakılamaz'),
          array('description','legnth','max'=>200,'tooLong'=>'Bu alan için ayrılan karakter sınırlamasını aştınız'),
          array('category_id, price, brand_id ,quantity','numerical','integerOnly'),
         
        );
      }
      
       public function primaryKey()
    {
        return '_id'; // Model field name, by default the _id field is used
    }
     public function indexes()
    {
        return array(
            // index name is not important, you may write whatever you want, just must be unique
            'index1_name'=>array(
                'key'=>array('product_id'=>EMongoCriteria::SORT_ASC ),
            ),
            'index2_name'=>array(
               'key'=>array('brand_id'=>  EMongoCriteria::SORT_ASC)
               ),
            'index3_name'=>array(
               'key'=>array('category_id'=>  EMongoCriteria::SORT_ASC)
               )
        );
    }
    
    public function getBrand() {
        
        $brand = Brand::model()->findByPk($this->brand_id);
        return $brand->brand_name;
    }
        
     

   
}
