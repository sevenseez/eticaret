<?php

class Product extends EMongoDocument
    {
      public $product_name;
      public $category_id;
      public $marka_id;
      public $image;
      public $price;
      public $description;
 
      // This has to be defined in every model, this is same as with standard Yii ActiveRecord
      public static function model($className=__CLASS__)
      {
        return parent::model($className);
      }
 
      // This method is required!
      public function getCollectionName()
      {
        return 'products';
      }
      
   
      public function rules()
      {
        return array(
          array('category_id,product_name,image','required','message'=>'Bu alan boş bırakılamaz'),
          array('description','legnth','max'=>200,'tooLong'=>'Bu alan için ayrılan karakter sınırlamasını aştınız'),
          array('category_id, price, marka_id','numerical','integerOnly'),
          array('image', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true, 'maxSize'=>10*1024*1024,'tooLarge'=>'dosya boyutu sınırları aşıyor...'
                            ,'on'=>'update'),
        );
      }
      
    public function relations()
    {
            // NOTE: you may need to adjust the relation name and the related
            // class name for the relations automatically generated below.
            return array(
                    'productBrand' => array(self::BELONGS_TO, 'Brand', 'marka_id'),
                    'productCategory' => array(self::BELONGS_TO, 'Category', 'category_id'),
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
                'key'=>array('category_id'=>EMongoCriteria::SORT_ASC ),
            ),
            'index2_name'=>array(
               'key'=>array('marka_id'=>  EMongoCriteria::SORT_ASC)
               )
        );
    }
        
    public function ProductProvider($category_id){ 
        $conditions = new EMongoCriteria;
        $conditions->category_id('==',$category_id);
        $dp = new EMongoDocumentDataProvider($this, array(
                 'criteria'=>$conditions,
                 'sort'=>array(
                     'attributes'=>array(
                         // list of sortable attributes
                     )
                 ),
             ));
        return $dp;
        }   

   
}
