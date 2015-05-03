<?php

class m150502_155731_new_table_countdown extends yupe\components\DbMigration
{
	
	public function safeUp()
	{
		$this->createTable('{{countdown_countdown}}', [
			'id'=>'pk',
			'name'=>'string',
			'settings'=>'text',
		], $this->getOptions());
	}

	public function safeDown()
	{
		$this->dropTable('{{countdown_countdown}}');
	}
	
}