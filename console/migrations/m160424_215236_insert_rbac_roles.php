<?php

use yii\db\Migration;

class m160424_215236_insert_rbac_roles extends Migration
{
    public function up()
    {
      $columns =[
        'name','type','description','created_at','updated_at'
      ];

      $rows = [
        ['theCreator','1','Site Creator Role',Time(),Time()],
        ['Admin','1','Site Administrator',Time(),Time()],
        ['Manager','1','Manager Level Employees',Time(),Time()],
        ['Employee','1','Employees',Time(),Time()],
      ];

      $this->batchInsert('auth_item',$columns, $rows);
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
