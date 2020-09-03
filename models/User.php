<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord
{
    public function getperson()
    {
        return $this->hasOne(Person::className(), ['id' => 'person_id']);
    }

    public function getcollections()
    {
        return $this->hasMany(Collection::className(), ['owner_id' => 'id']);
    }

}
