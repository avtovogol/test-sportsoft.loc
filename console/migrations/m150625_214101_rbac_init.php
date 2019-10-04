<?php

use common\models\User;
use yii\db\Migration;

class m150625_214101_rbac_init extends Migration
{
    /**
     * @return bool|void
     * @throws \yii\base\Exception
     */
    public function up()
    {
        $auth = Yii::$app->authManager;

        // добавляем разрешение "deleteFeedbackMessage"
        $deleteFeedbackMessage = $auth->createPermission('deleteFeedbackMessage');
        $deleteFeedbackMessage->description = 'Delete feedback message';
        $auth->add($deleteFeedbackMessage);

        // добавляем разрешение "viewAllFeedbackMessages"
        $viewAllFeedbackMessages = $auth->createPermission('viewAllFeedbackMessages');
        $viewAllFeedbackMessages->description = 'View all feedback messages';
        $auth->add($viewAllFeedbackMessages);

        // добавляем роль "user"
        $user = $auth->createRole(User::ROLE_USER);
        $auth->add($user);

        // добавляем роль "admin" и даём роли разрешение "deleteFeedbackMessage"
        $admin = $auth->createRole(User::ROLE_ADMIN);
        $auth->add($admin);
        $auth->addChild($admin, $deleteFeedbackMessage);
        $auth->addChild($admin, $viewAllFeedbackMessages);
    }

    /**
     * @return bool|void
     */
    public function down()
    {
        $this->auth->remove($this->auth->getRole(User::ROLE_ADMIN));
        $this->auth->remove($this->auth->getRole(User::ROLE_USER));
    }
}
