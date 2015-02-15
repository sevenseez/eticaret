<?php

class m150214_184018_fill_table extends CDbMigration
{
	public function up()
	{
            $mongo = new MongoClient();
            $db = $mongo->selectDB('eTicaretDatabase');
            $collection = $db->selectCollection('categories');
            $add = array(
            array('category_name' => 'Spor Giyim','_id'=>'1'),
            array('category_name' => 'Bay Giyim','_id'=>'2'),
            array('category_name' => 'Bayan Giyim','_id'=>'3'),
            array('category_name' => 'Çocuk Giyim','_id'=>'4'),
            array('category_name' => 'İç Giyim','_id'=>'5'),
            array('category_name' => 'Çantalar','_id'=>'6'),
            array('category_name' => 'Ayakkabılar','_id'=>'7'),
            array('category_name' => 'Aksesuarlar','_id'=>'8'),
            array('category_name' => 'Moda','_id'=>'9')    
             
                    
                    );
            for($i=0;$i<count($add);$i++)
            $collection->insert($add[$i]);
            
	}

	public function down()
	{   
            
                  $mongo = new MongoClient();
                  $db = $mongo->selectDB('eTicaretDatabase');
                  $collection = $db->selectCollection('categories');
                  $collection->remove();
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}