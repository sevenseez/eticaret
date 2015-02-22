<?php

class Bill extends EMongoDocument
    {
      public $user_id;
      public $checkout_id;
      public $cpname;
      public $email;
      public $title;
      public $name;
      public $surname;
      public $address1;
      public $address2;
      public $password;
      public $postal_code;
      public $country;
      public $phone;
      public $mobile;
      public $fax;
      public $city;
      public $date;
      /*
 */
      
      // This has to be defined in every model, this is same as with standard Yii ActiveRecord
      public static function model($className=__CLASS__)
      {
        return parent::model($className);
      }
 
      // This method is required!
      public function getCollectionName()
      {
        return 'Bills';
      }
      
   
      public function rules()
      {
        return array(array('user_id','required'),
            array('postal_code','numerical','integerOnly'=>true,'message'=>'Bu alan rakamlardan oluşmalıdır'),
            array('name, surname, cpname, country, city','match','pattern' => '/^[a-zA-ZÇŞĞÜÖİçşğüöı\s]+$/',
                'message'=>'Bu alan harflerden oluşmalıdır'),
            array('address1,address2','length','max'=>100,'min'=>10,'tooShort'=>'Bu alan 10 karakterden uzun olmalıdır',
                'tooLong'=>'Bu alanda 200 karakter sınırı bulunmaktadır'),
            
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
                    'checkout_id'=>  EMongoCriteria::SORT_ASC
                ),
            'unique'=>true,
            ),
            'index2_name'=>array(
               'key'=>array(
                   'user_id'=>  EMongoCriteria::SORT_ASC,
               ),
               'unique'=>false,
            )
        );
    } 
       public function primaryKey()
    {
        return '_id'; // Model field name, by default the _id field is used
    }

    
} 

     