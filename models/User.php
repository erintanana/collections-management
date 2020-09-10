<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    public function rules()
    {
        return [
            ['login', 'required'],
            ['email', 'required'],
            ['nickname', 'required'],
            ['site_theme', 'required'],
            ['site_language', 'required'],
        ];
    }

    public function getperson()
    {
        return $this->hasOne(Person::className(), ['id' => 'person_id']);
    }

    public function getcollections()
    {
        return $this->hasMany(Collection::className(), ['owner_id' => 'id']);
    }

    public static function findByEmail($email)
    {
        return User::find()->where(['email' => $email])->one();
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public static function findIdentity($id)
    {
        return User::findOne($id);
    }

    public function getId()
    {
        return $this->id;
    }

    public static function isBlocked($user){
        return $user->is_blocked;
    }

    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }
}
