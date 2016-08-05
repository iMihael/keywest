<?php

use yii\db\Migration;

class m160805_082038_bookmark extends Migration
{
    public function up()
    {
        $this->createTable('bookmark', [
            'id' => $this->primaryKey(),
            'created_at' => $this->dateTime(),
            'url' => $this->string(1024),
        ]);
    }

    public function down()
    {
        $this->dropTable('bookmark');
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
