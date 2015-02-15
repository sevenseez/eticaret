<?php

class User extends EMongoDocument
    {
      public $login;
      public $name;
      public $pass;
      public $user_id;
 
      // This has to be defined in every model, this is same as with standard Yii ActiveRecord
      public static function model($className=__CLASS__)
      {
        return parent::model($className);
      }
 
      // This method is required!
      public function getCollectionName()
      {
        return 'users';
      }
      
   
      public function rules()
      {
        return array(
          array('login, pass', 'required','message'=>'Bu alan boş bırakılamaz'),
          array('login, pass', 'length', 'max' => 20,'min'=>'2','tooShort'=>'Bu kadar kısa giriş yapılamaz.'),
          array('name', 'length', 'max' => 255),
        );
      }
 
      public function getAttributeLabels()
      {
        return array(
          'login'  => 'User Login',
          'name'   => 'Full name',
          'pass'   => 'Password',
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
                'generate_index'=>array(
                    // key array holds list of fields for index
                    // you may define multiple keys for index and multikey indexes
                    // each key must have a sorting direction SORT_ASC or SORT_DESC
                    'key'=>array(
                        'user_id'=>EMongoCriteria::SORT_ASC,
                    ),

                    // unique, if indexed field must be unique, define a unique key
                    'unique'=>true,
                ),
            );
        }
        public function getNextSequence($name){
            $m = new MongoClient();
            $db = $m->eTicaretDatabase;
            $collection = $db->selectCollection('counters');

            $retval = $collection->findAndModify(
                 array('_id' => $name),
                 array('$inc' => array("seq" => 1)),
                 null,
                 array(
                    "new" => true,
                )
            );
            return $retval['seq'];
            }
            
            public function insertDocument($doc, $targetCollection) {
                    
                while (true){
                
                    $criteria = new EMongoCriteria;
                    $criteria->limit(1)->sort('_id', EMongoCriteria::SORT_DESC);
                    $cursor = $targetCollection->findAll($criteria);
                   
                    $doc->_id = $cursor[0]->_id+1;
                    if($doc->save()) 
                      break;
                    }
                }

        
    }
