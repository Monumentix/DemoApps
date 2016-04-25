<?php

use yii\db\Migration;

class m160424_215236_insert_rbac_roles extends Migration
{
    public function up()
    {
      $auth_item_columns =[
        'name','type','description','created_at','updated_at'
      ];

      $auth_item_rows = [
        ['theCreator','1','Site Creator Role',Time(),Time()],
        ['Admin','1','Site Administrator',Time(),Time()],
        ['Manager','1','Manager Level Employees',Time(),Time()],
        ['Employee','1','Employees',Time(),Time()],
        ['/admin/*','2','admin route',Time(),Time()],
        ['/debug/*','2','admin route',Time(),Time()],
      ];
      $this->batchInsert('auth_item',$auth_item_columns, $auth_item_rows);
    }

    public function down()
    {
        $this->execute('DELETE From auth_item WHERE name <> "";');//
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
