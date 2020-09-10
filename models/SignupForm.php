<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $login;
    public $email;
    public $password;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['login', 'trim'],
            ['login', 'required'],
//            ['login', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
            ['login', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->person_id = 1;
        $user->login = $this->login;
        $user->nickname = $this->login;
        $user->setPassword($this->password);
        $user->created = date('Y-m-d H:i:s');
        $user->email = $this->email;
        $user->site_language = 'Русский';
        $user->site_theme = 'dark';
        $user->is_blocked = 0;
        return $user->save();

    }

}
