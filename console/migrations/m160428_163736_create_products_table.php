<?php

use yii\db\Migration;

/**
 * Handles the creation for table `products_table`.
 */
class m160428_163736_create_products_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('products', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(),
            'shopping_cat_id'=> $this->integer(),
            'description'=>$this->text(),
            'manufacturer'=>$this->string(),
            'image_large'=>$this->string(),
            'image_small'=>$this->string(),
            'base_price'=>$this->integer()
        ]);


        $this->addForeignKey(
          'fk_shopping_cat_id',
          'products',
          'shopping_cat_id',
          'product_categories',
          'shopping_cat_id'
        );

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('products');
    }
}
