<?php

use yii\db\Migration;

class m160203_095625_shop extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%shop_category}}', [
            'id' => $this->primaryKey(),
            'root' => $this->integer()->defaultValue(NULL),
            'lvl' => $this->integer()->notNull()->defaultValue(0),
            'icon' => $this->string(),
            'icon_type' => $this->smallInteger()->defaultValue(1),
            'active' => $this->boolean()->defaultValue(true),
            'visible' => $this->boolean()->defaultValue(true),
            'disabled' => $this->boolean()->notNull()->defaultValue(false),
            'selected' => $this->boolean()->defaultValue(false),
            'readonly' => $this->boolean()->defaultValue(false),
            'collapsed' => $this->boolean()->defaultValue(false),
            'movable_d' => $this->boolean()->defaultValue(false),
            'movable_u' => $this->boolean()->defaultValue(false),
            'movable_l' => $this->boolean()->defaultValue(false),
            'movable_r' => $this->boolean()->defaultValue(false),
            'removable' => $this->boolean()->defaultValue(true),
            'removable_all' => $this->boolean()->defaultValue(false),
            'name' => $this->string()->notNull(),
            'discount' => $this->float()->defaultValue(0),
            'lft' => $this->integer()->notNull(),
            'rgt'=> $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
        
        $this->createTable('{{%shop_items}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'type' => $this->integer()->defaultValue(0),
            'name' => $this->string(),
            'item_id' => $this->integer(),
            'cost' => $this->integer(),
            'discount' => $this->float()->defaultValue(0),
            'discount_end' => $this->dateTime(),
            'realm_id' => $this->integer()->null(),
        ]);
        
        $this->createTable('{{%shop_package_items}}', [
            'id' => $this->primaryKey(),
            'shop_parent_item_id' => $this->integer(),
            'shop_item_id' => $this->integer(),
        ]);
        
        $this->createTable('{{%shop_basket}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'item_id' => $this->integer()->notNull(),
            'count' => $this->integer()->defaultValue(1),
        ]);

        $this->addForeignKey('fk_shop_category', '{{%shop_items}}', 'category_id', '{{%shop_category}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_shop_package_items', '{{%shop_package_items}}', 'shop_item_id', '{{%shop_items}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_shop_package_items_parent', '{{%shop_package_items}}', 'shop_parent_item_id', '{{%shop_items}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_shop_basked', '{{%shop_basket}}', 'item_id', '{{%shop_items}}', 'id', 'cascade', 'cascade');
        
    }

    public function down()
    {
        $this->dropForeignKey('fk_shop_category', '{{%shop_items}}');
        $this->dropForeignKey('fk_shop_package_items', '{{%shop_package_items}}');
        $this->dropForeignKey('fk_shop_package_items_parent', '{{%shop_package_items}}');
        $this->dropForeignKey('fk_shop_basked', '{{%shop_basket}}');
        
        $this->dropTable('{{%shop_basket}}');
    }
}
