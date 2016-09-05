<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation for table `products`.
 */
class m160903_091326_create_products_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('product', [
            'product_id'    =>    Schema::TYPE_PK,
            'id'            =>    Schema::TYPE_STRING  . ' NOT NULL',
            'name'          =>    Schema::TYPE_STRING  . ' NOT NULL',
            'description'   =>    Schema::TYPE_STRING  . ' NOT NULL',
            'images'        =>    Schema::TYPE_STRING  . ' NOT NULL',
            'price'         =>    Schema::TYPE_INTEGER . ' NOT NULL',
        ]);

        $this->createTable('store', [
            'store_id'      =>    Schema::TYPE_PK,
            'id'            =>    Schema::TYPE_STRING  . ' NOT NULL',
            'name'          =>    Schema::TYPE_STRING  . ' NOT NULL',
            'address'       =>    Schema::TYPE_STRING  . ' NOT NULL',
            'worktime'      =>    Schema::TYPE_STRING  . ' NOT NULL',
            'distribute'    =>    Schema::TYPE_BOOLEAN . ' NOT NULL',
        ]);

        $this->createTable('stock', [
            'store_id'      =>    Schema::TYPE_INTEGER  . ' NOT NULL',
            'product_id'    =>    Schema::TYPE_INTEGER  . ' NOT NULL',
            'availible'     =>    Schema::TYPE_INTEGER  . ' NOT NULL',
            'reserved'      =>    Schema::TYPE_INTEGER  . ' NOT NULL',
        ]);
        $this->addForeignKey(
            'stock_product_id',
            'stock',
            'product_id',
            'product',
            'product_id',
            'RESTRICT',
            'CASCADE'
        );

        $this->createTable('customer', [
            'customer_id'   =>    Schema::TYPE_PK,
            'name'          =>    Schema::TYPE_STRING  . ' NOT NULL',
            'comment'       =>    Schema::TYPE_STRING  . ' NOT NULL',
        ]);

        $this->createTable('order', [
            'order_id'      =>    Schema::TYPE_PK,
            'customer_id'   =>    Schema::TYPE_INTEGER  . ' NOT NULL',
            'store_id'      =>    Schema::TYPE_INTEGER  . ' NOT NULL',
        ]);
        $this->createIndex('customer_id__store_id', 'order', ['customer_id', 'store_id']);
        $this->addForeignKey(
            'order_customer_id',
            'order',
            'customer_id',
            'customer',
            'customer_id',
            'RESTRICT',
            'CASCADE'
        );
        $this->addForeignKey('order_store_id', 'order', 'store_id', 'store', 'store_id', 'RESTRICT', 'CASCADE');

        $this->createTable('order_item', [
            'order_item_id' =>    Schema::TYPE_PK,
            'order_id'      =>    Schema::TYPE_INTEGER  . ' NOT NULL',
            'product_id'    =>    Schema::TYPE_INTEGER  . ' NOT NULL',
            'count'         =>    Schema::TYPE_INTEGER  . ' NOT NULL',
        ]);
        $this->createIndex('order_id__product_id', 'order_item', ['order_id', 'product_id']);
        $this->addForeignKey(
            'order_item_order_id',
            'order_item',
            'order_id',
            'order',
            'order_id',
            'RESTRICT',
            'CASCADE'
        );
        $this->addForeignKey(
            'order_item_product_id',
            'order_item',
            'product_id',
            'product',
            'product_id',
            'RESTRICT',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('order_item');
        $this->dropTable('order');
        $this->dropTable('customer');
        $this->dropTable('stock');
        $this->dropTable('store');
        $this->dropTable('product');
    }
}
