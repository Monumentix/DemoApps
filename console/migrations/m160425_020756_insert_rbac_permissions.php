<?php

use yii\db\Migration;

class m160425_020756_insert_rbac_permissions extends Migration
{
    public function up()
    {
      $auth_columns =[
        'item_name','user_id','created_at',
      ];

      $auth_rows = [
        ['theCreator','1',Time()],
      ];
      $this->batchInsert('auth_assignment',$auth_columns, $auth_rows);
    }

    public function down()
    {
      $this->execute('DELETE From auth_assignment WHERE item_name <> "";');//
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
