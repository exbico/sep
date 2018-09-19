<?php

use yii\db\Migration;

/**
 * Handles the creation of table `request`.
 */
class m180917_162849_create_request_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('request', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'sequence' => $this->string()->notNull(),
            'number' => $this->integer()->notNull(),
            'result' => $this->integer()->notNull(),
        ]);

        $this->createIndex(
            'user_id',
            'request',
            'user_id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex(
            'user_id',
            'request'
        );

        $this->dropTable('request');
    }
}
