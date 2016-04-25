<?php

use yii\db\Migration;

class m160425_021745_insert_rbac_assignments extends Migration
{
    public function up()
    {
      $auth_columns =[
        'parent','child',
      ];

      $auth_rows = [
        ['theCreator','/admin/*'],
        ['theCreator','/debug/*'],
      ];
      $this->batchInsert('auth_item_child',$auth_columns, $auth_rows);
    }

    public function down()
    {
      $this->execute('DELETE From auth_item_child WHERE parent <> "";');//
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
