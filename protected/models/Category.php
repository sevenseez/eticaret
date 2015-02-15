<?php

class Category extends EMongoDocument
    {
      public $category_name;
      // This has to be defined in every model, this is same as with standard Yii ActiveRecord
      public static function model($className=__CLASS__)
      {
        return parent::model($className);
      }
 
      // This method is required!
      public function getCollectionName()
      {
        return 'categories';
      }
      
   
      public function rules()
      {
        return array(
          array('category_name','match','pattern' => '/^[a-zA-ZÇŞĞÜÖİçşğüöı\s]+$/',
                            'message'=>'Bu alan harflerden oluşmak zorundadır.'),
        );
      }
      
    public function relations()
    {
            // NOTE: you may need to adjust the relation name and the related
            // class name for the relations automatically generated below.
            return array(
                    'categoryBrand' => array(self::HAS_MANY, 'Brand', 'category_id'),
                    'categoryProduct' => array(self::HAS_MANY, 'Product', 'category_id'),
            );
    }
 
      public function getAttributeLabels()
      {
        return array(
          'category_name' => 'Kategori Adı'
        );
      }
       public function primaryKey()
    {
        return '_id'; // Model field name, by default the _id field is used
    }
    
       

        
    }
