<?php

use yii\db\Migration;

/**
 * Handles the creation for table `characters_stats_table`.
 */
class m160510_042131_create_characters_stats_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('characters_stats_table', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(),
            'characterId'=>$this->integer(),
            'imgURI'=>$this->string(),
            'comicsCount'=>$this->integer(),
            'seriesCount'=>$this->integer(),
            'storiesCount'=>$this->integer(),
            'eventsCount'=>$this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('characters_stats_table');
    }
}
