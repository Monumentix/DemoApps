<?php

use yii\db\Migration;

class m160427_155635_create_product_categories extends Migration
{
    public function up()
    {
        $this->createTable('product_categories', [
            'id' => $this->primaryKey(),
            'shopping_cat_id'=> $this->integer(),
            'name'=>$this->string(),
            'catgeoryURL'=>$this->string(),
            'parent_shopping_cat_id'=>$this->integer()
        ]);

        $this->createIndex(
          'idx_shopping_cat_id',
          'product_categories',
          'shopping_cat_id'
        );

        $this->addForeignKey(
          'fk_parent_cat',
          'product_categories',
          'parent_shopping_cat_id',
          'product_categories',
          'shopping_cat_id'
      );
    }

    public function down()
    {
        $this->dropTable('product_categories');
    }
}
