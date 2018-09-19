<?php

use yii\db\Migration;

/**
 * Class m180917_182217_insert_in_user_table
 */
class m180917_182217_insert_in_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('user', [
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test1key',
            'accessToken' => '1token',
        ]);

        $this->insert('user', [
            'username' => 'demo',
            'password' => 'demo',
            'authKey' => 'test2key',
            'accessToken' => '2token',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180917_182217_insert_in_user_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180917_182217_insert_in_user_table cannot be reverted.\n";

        return false;
    }
    */
}
