<?php

class m150214_161941_create_products_table extends CDbMigration
{
	public function up()
	{
            $mongo = new MongoClient();
            $db = $mongo->selectDB('eTicaretDatabase');
            $db->createCollection('categories');
	}

	public function down()
	{
		echo "m150214_161941_create_products_table does not support migration down.\n";
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