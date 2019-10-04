<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%feedback_message}}`.
 */
class m191001_091150_create_feedback_message_table extends Migration
{
    /**
     * {@inheritdoc}
     */

    public function safeUp()
    {
        $this->createTable('{{%feedback_message}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11),
            'first_name' => $this->string(50),
            'last_name' => $this->string(50),
            'email' => $this->string(50),
            'phone' => $this->string(50),
            'body' => $this->text(),
        ]);
        $this->addForeignKey(
            'fk-contact_form-user_id',
            'feedback_message',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%feedback_message}}');
    }
}
