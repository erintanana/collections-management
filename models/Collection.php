<?php

namespace app\models;

use yii\db\ActiveRecord;

class Collection extends ActiveRecord
{

    public function getitems(){
        return $this->hasMany(Item::className(), ['collection_id' => 'id']);
    }

    public function getuser(){
        return $this->hasOne(User::className(), ['id' => 'owner_id']);
    }

}