<?php
include 'getDB.php';
class m150214_192806_create_urun_table extends CDbMigration
{
	public function up()
	{     $mongo = new MongoClient();
            $db = $mongo->selectDB('eTicaretDatabase');;
            $db->createCollection('products');
	}

	public function down()
	{
		echo "m150214_192806_create_urun_table does not support migration down.\n";
		return false;
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