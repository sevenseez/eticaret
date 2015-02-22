<?php

class Country extends EMongoDocument
    {
      public $country_name;
      public $cities;
      // This has to be defined in every model, this is same as with standard Yii ActiveRecord
      public static function model($className=__CLASS__)
      {
        return parent::model($className);
      }
 
      // This method is required!
      public function getCollectionName()
      {
        return 'Countries';
      }
      
   
      public function rules()
      {
        return array(
          array('country_name','match','pattern' => '/^[a-zA-ZÇŞĞÜÖİçşğüöı\s]+$/',
                            'message'=>'Bu alan harflerden oluşmak zorundadır.'),
        );
      }
      
  
 
      public function getAttributeLabels()
      {
        return array(
          'country_name' => 'Ülke Adı',
          'cities' => 'Şehirler',
        );
      }
       public function primaryKey()
    {
        return '_id'; // Model field name, by default the _id field is used
    }
    
       
    public function getCountries() {
        
        $criteria = new EMongoCriteria();
        $criteria->select(array('country_name'));
        $list = CHtml::listData($this->findAll($criteria),'country_name','country_name');
        return $list;
    }
  
    
    public function getCities($country){
        $cities = $this->findByAttributes(array('country_name'=>$country))->cities;
        
         echo CHtml::tag('option',array('value' => ''),'Seçiniz',true);
         foreach($cities as $value=>$name)
            {
                echo CHtml::tag('option',
                           array('value'=>$name),CHtml::encode($name),true);
               
            }
    }
        
    }
