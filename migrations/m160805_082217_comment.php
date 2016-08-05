<?php

use yii\db\Migration;

class m160805_082217_comment extends Migration {
    public function up() {
        $this->createTable('comment', [
            'id' => $this->primaryKey(),
            'created_at' => $this->dateTime(),
            'ip' => $this->string(32),
            'text' => $this->text(),
            'bookmark_id' => $this->integer(),
        ]);

        $this->addForeignKey('fk_bookmark', 'comment', 'bookmark_id', 'bookmark', 'id', 'CASCADE', 'CASCADE');
    }

    public function down() {
        $this->dropTable('comment');
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
