<?php

use yii\db\Schema;
use yii\db\Migration;

class m160219_145445_create_rbac_tables extends Migration {

    public function safeUp() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable(
                'auth_rule', [
            'name' => 'varchar(64) NOT NULL PRIMARY KEY',
            'data' => Schema::TYPE_TEXT,
            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER
                ], $tableOptions
        );

        $this->createTable(
                'auth_item', [
            'name' => 'varchar(64) NOT NULL PRIMARY KEY',
            'type' => Schema::TYPE_INTEGER . ' NOT NULL',
            'description' => Schema::TYPE_TEXT,
            'rule_name' => Schema::TYPE_STRING,
            'data' => Schema::TYPE_TEXT,
            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
                ], $tableOptions
        );



        $this->addForeignKey(
                'item_rule', 'auth_item', 'rule_name', 'auth_rule', 'name', 'set null', 'cascade'
        );

        $this->createIndex('type', 'auth_item', 'type');

        $this->createTable(
                'auth_item_child', [
            'parent' => 'varchar(64) NOT NULL PRIMARY KEY',
            'child' => 'varchar(64) NOT NULL'
                ], $tableOptions
        );

        $this->addForeignKey(
                'parent_name', 'auth_item_child', 'parent', 'auth_item', 'name', 'cascade', 'cascade'
        );
        $this->addForeignKey(
                'child_name', 'auth_item_child', 'child', 'auth_item', 'name', 'cascade', 'cascade'
        );

        $this->createTable(
                'auth_assignment', [
            'item_name' => 'varchar(64) NOT NULL PRIMARY KEY',
            'user_id' => 'varchar(64) NOT NULL',
            'created_at' => Schema::TYPE_INTEGER
                ], $tableOptions
        );

        $this->addForeignKey(
                'assignment_name', 'auth_assignment', 'item_name', 'auth_item', 'name', 'cascade', 'cascade'
        );
    }

    public function safeDown() {

        $this->dropTable('auth_rule');
        $this->dropTable('auth_item');
        $this->dropTable('auth_item_child');
        $this->dropTable('auth_assignment');

        $this->dropForeignKey('item_rule');
        $this->dropForeignKey('parent_name');
        $this->dropForeignKey('child_name');
        $this->dropForeignKey('assignment_name');
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
