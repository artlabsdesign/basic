<?php

use yii\db\Schema;
use yii\db\Migration;

class m160213_143410_create_profile_table extends Migration
{
    public function safeUp()
    {
        
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
    $this->createTable(
      'profile',
        [
            'user_id' => Schema::TYPE_PK,
            'avatar' => Schema::TYPE_STRING,
            'company_name' => Schema::TYPE_STRING,
            'company_site' => Schema::TYPE_STRING,
            'company_phone' => Schema::TYPE_STRING.'(32)',
            'company_email' => Schema::TYPE_STRING.'(32)',
            'company_adress' => Schema::TYPE_STRING,
            'company_rod' => Schema::TYPE_SMALLINT,
            'company_spec' => Schema::TYPE_STRING,
            'company_info' => Schema::TYPE_TEXT,
            'contact_name' => Schema::TYPE_STRING,
            'contact_job' => Schema::TYPE_STRING,
            'contact_phone' => Schema::TYPE_STRING.'(32)',
            'contact_email' => Schema::TYPE_STRING.'(32)',
            'product_type' => Schema::TYPE_STRING,
            'product_discont' => Schema::TYPE_STRING,
            'product_sklad' => Schema::TYPE_SMALLINT,
            'product_srok' => Schema::TYPE_STRING

        ] , $tableOptions
    );
        $this->addForeignKey(
          'profile_user',
            'profile',
            'user_id',
            'user',
            'id',
            'cascade',
            'cascade'
        );
    }

    public function safeDown()
    {

        $this->dropForeignKey('profile_user','profile');
        $this->dropTable('profile');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
