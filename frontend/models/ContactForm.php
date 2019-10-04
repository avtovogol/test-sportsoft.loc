<?php

namespace frontend\models;

use common\components\Helper;
use common\models\FeedbackMessage;
use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $verifyCode;
    public $firstName;
    public $lastName;
    public $email;
    public $body;
    public $phone;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // firstName, lastName, email, subject and body are required
            [['firstName','lastName', 'email', 'body', 'phone'], 'required'],
            [['firstName','lastName'], 'match', 'pattern' => '/^[a-zA-Zа-яА-Я]+$/ui'],
            [['firstName','lastName'], 'string', 'min' => 3],
            [['body'], 'string', 'min' => 100],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'firstName' => 'Имя',
            'lastName' => 'Фамилия',
            'phone' => 'Телефон',
            'body' => 'Текст',
            'verifyCode' => 'Код подтверждения',
        ];
    }

    /**
     * Save message.
     *
     * @return bool whether the saving new message was successful
     */
    public function saveMessage()
    {
        if (!$this->validate()) {
            return null;
        }

        $message = new FeedbackMessage();
        $message->first_name = Helper::my_mb_ucfirst($this->firstName);
        $message->last_name = Helper::my_mb_ucfirst($this->lastName);
        $message->email = $this->email;
        $message->phone = $this->phone;
        $message->body = $this->body;
        $message->user_id = Yii::$app->user->getId();
        return $message->save();

    }

}
