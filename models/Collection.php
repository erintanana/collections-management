<?php

namespace app\models;

use yii\db\ActiveRecord;

class Collection extends ActiveRecord
{

    public function getuser(){
        return $this->hasOne(User::className(), ['id' => 'owner_id']);
    }

}