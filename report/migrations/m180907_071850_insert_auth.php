<?php

use yii\db\Migration;

/**
 * Class m180907_071850_insert_auth
 */
class m180907_071850_insert_auth extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('auth_item', [
            'name' => 'reporter',
            'type' => '1',
            'description' => 'Репортер. Может просматривать веб-отчеты',
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('auth_item', [
            'name' => 'view_reports',
            'type' => '2',
            'description' => 'Просмотр веб-отчетов',
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('auth_item_child', [
            'parent' => 'reporter',
            'child' => 'view_reports',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('auth_item', ['name' => 'reporter']);
        $this->delete('auth_item', ['name' => 'view_reports']);
        $this->delete('auth_item_child', ['parent' => 'reporter', 'child' => 'view_reports']);

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180907_071850_insert_auth cannot be reverted.\n";

        return false;
    }
    */
}
