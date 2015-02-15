<?php

class Brand extends EMongoDocument {
    
    
    public $category_id;
    public $brand_name;
    
     public static function model($className=__CLASS__)
      {
        return parent::model($className);
      }
    
     public function getCollectionName()
      {
        return 'brands';
      }
    
    public function rules()
      {
        return array(
          array('category_id','match','pattern' => '/^[a-zA-ZÇŞĞÜÖİçşğüöı\s]+$/',
                            'message'=>'Bu alan harflerden oluşmak zorundadır.'),
          array('brand_name','lenght','max'=>20,'tooLong'=>'Bu alan için ayrılan karakter sınırını aştınız.'),
          array('brand_name, category_id','required','message'=>'Bu alan boş bırakılamaz.'),
        );
      }
      
    	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'brandCategory' => array(self::BELONGS_TO, 'Category', 'category_id'),
			'brandProduct' => array(self::HAS_MANY, 'Product', 'marka_id'),
		);
	}
      
    public function getAttributeLabels()
      {
        return array(
          'category_name' => 'Kategori ID',
          'brand_name' => 'Marka Adı'
        );
      }
      
    public function primaryKey()
        {
            return '_id'; // Model field name, by default the _id field is used
        }
        
       public function BrandProvider($category_id){
    
        
        $mongo = Yii::app()->mongodb->getConnection();
        $db = $mongo->selectDB('eTicaretDatabase');
        
        $condition= array('category_id'=>$category_id);
        $products= $db->selectCollection('products');
        $retCount = $products->group(
                array('marka_id'=>true),
                array('count'=>0), 
                new MongoCode('function(doc, prev) { prev.count += 1 }'), 
                $condition);
        
        $result = $retCount['retval'];
        return new CArrayDataProvider($result,
                array(
                    'keyField'=>'marka_id',
                ));
    }
        
}