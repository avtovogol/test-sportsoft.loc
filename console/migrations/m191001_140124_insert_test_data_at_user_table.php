<?php

use common\models\User;
use yii\db\Migration;

/**
 * Class m191001_140124_insert_test_data_at_user_and_message_feedback_tables
 */
class m191001_140124_insert_test_data_at_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $user = new User();
        $user->id = 1;
        $user->username = 'admin';
        $user->email = 'admin@ya.ru';
        $user->setPassword(111111);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $auth = Yii::$app->authManager;
        $auth->assign($auth->getRole(User::ROLE_ADMIN), $user->id);
        $user->save();

        $user = new User();
        $user->id = 2;
        $user->username = 'user';
        $user->email = 'user@ya.ru';
        $user->setPassword(111111);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $auth = Yii::$app->authManager;
        $auth->assign($auth->getRole(User::ROLE_USER), $user->id);
        $user->save();

        $faker = \Faker\Factory::create('en_EN');
        for ($i = 3; $i < 12; $i++) {
            $user = new User();
            $user->id = $i;
            $user->username = $faker->unique()->firstName;
            $user->email = $faker->unique()->email;
            $user->setPassword(111111);
            $user->generateAuthKey();
            $user->generateEmailVerificationToken();
            $auth = Yii::$app->authManager;
            $auth->assign($auth->getRole(User::ROLE_USER), $user->id);
            $user->save();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191001_140124_insert_test_data_at_user_and_message_feedback_tables cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191001_140124_insert_test_data_at_user_and_message_feedback_tables cannot be reverted.\n";

        return false;
    }
    */
}
