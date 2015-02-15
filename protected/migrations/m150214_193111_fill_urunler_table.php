<?php

class m150214_193111_fill_urunler_table extends CDbMigration
{
	public function up()
	{   
            $mongo = new MongoClient();
            $db = $mongo->selectDB('eTicaretDatabase');
            $collection = $db->selectCollection('products');
            $add = array(
            array('product_name' => 'Adidas T-Shirt','category_id'=>'1'
                ,'image'=>'product12.jpg','price'=>'55',
                'description'=>'Deneme Amaçlı Açıklama Yazısı','marka_id'=>'1'),
            array('product_name' => 'Adidas Ayakabı','category_id'=>'1',
                'image'=>'product11.jpg','price'=>'55',
                'description'=>'Deneme Amaçlı Açıklama Yazısı','marka_id'=>'1'),
            array('product_name' => 'Nike T-Shirt',
                'category_id'=>'1','image'=>'product7.jpg','price'=>'55',
                'description'=>'Deneme Amaçlı Açıklama Yazısı','marka_id'=>'1'),
            array('product_name' => 'Nike Ayakkabı','category_id'=>'1',
                'image'=>'product6.jpg','price'=>'55',
                'description'=>'Deneme Amaçlı Açıklama Yazısı','marka_id'=>'1'),
            array('product_name' => 'Puma T-Shirt','category_id'=>'1',
                'image'=>'product5.jpg','price'=>'55',
                'description'=>'Deneme Amaçlı Açıklama Yazısı','marka_id'=>'1'),
            array('product_name' => 'puma Ayakkabı','category_id'=>'1',
                'image'=>'product4.jpg','price'=>'55',
                'description'=>'Deneme Amaçlı Açıklama Yazısı','marka_id'=>'1'),
            array('product_name' => 'Levi\'s Pantolon','category_id'=>'1',
                'image'=>'product3.jpg','price'=>'55',
                'description'=>'Deneme Amaçlı Açıklama Yazısı','marka_id'=>'1'),
            array('product_name' => 'Mavi Pantolon','category_id'=>'2',
                'image'=>'product2.jpg','price'=>'55',
                'description'=>'Deneme Amaçlı Açıklama Yazısı','marka_id'=>'1'),
            array('product_name' => 'DD Çanta','category_id'=>'2',
                'image'=>'product1.jpg','price'=>'55',
                'description'=>'Deneme Amaçlı Açıklama Yazısı','marka_id'=>'1') 
                    );
            
            for($i=0;$i<count($add);$i++)
            $collection->insert($add[$i]);
	}

	public function down()
	{
		$mongo = new MongoClient();
                  $db = $mongo->selectDB('eTicaretDatabase');
                  $collection = $db->selectCollection('products');
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