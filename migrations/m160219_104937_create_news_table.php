<?php

use yii\db\Schema;
use yii\db\Migration;

class m160219_104937_create_news_table extends Migration {

    public function safeUp() {
        
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable(
                'news', [
            'id' => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_INTEGER,
            'news_header' => Schema::TYPE_STRING,
            'news_text' => Schema::TYPE_TEXT
            
                ], $tableOptions
        );
        $this->addForeignKey(
                'news_user', 'news', 'user_id', 'user', 'id', 'cascade', 'cascade'
        );
    }

    public function safeDown() {

        $this->dropForeignKey('news_user', 'news');
        $this->dropTable('news');
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
