<?php

use common\models\FeedbackMessage;
use Faker\Factory;
use yii\db\Migration;

/**
 * Class m191003_134818_insert_test_data_at_feedback_message_table
 */
class m191003_134818_insert_test_data_at_feedback_message_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        for ($i = 0; $i < 100; $i++) {
            $faker = Factory::create('en_EN');
            $message = new FeedbackMessage();
            $message->user_id = $faker->biasedNumberBetween(2, 11);
            $message->first_name = $faker->firstName;
            $message->last_name = $faker->lastName;
            $message->email = $faker->email;
            $message->phone = $faker->phoneNumber;
            $message->body = $faker->text(100);
            $message->save();
        }

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%feedback_message}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191003_134818_insert_test_data_at_feedback_message_table cannot be reverted.\n";

        return false;
    }
    */
}
