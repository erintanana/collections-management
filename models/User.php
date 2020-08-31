<?php

namespace app\models;

use yii\db\ActiveRecord;

class User extends ActiveRecord
{
    public function getperson(){
        return $this->hasOne(Person::className(), ['id' => 'person_id']);
    }
}
