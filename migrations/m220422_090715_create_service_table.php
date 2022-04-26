<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%service}}`.
 */
class m220422_090715_create_service_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%service}}', [
            'id' => $this->primaryKey(),
            'type' => $this->string()->defaultValue('proxy'),
            'ip' => $this->integer(),
            'domain' => $this->integer(),
            'client_id' => $this->integer(),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%service}}');
    }
}
