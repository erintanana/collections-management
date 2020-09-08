<?php

namespace app\models;

use yii\db\ActiveRecord;

class Tag extends ActiveRecord
{

    public function getitems()
    {
        return $this->hasMany(Item::className(), ['id' => 'item_id'])->viaTable('item_tags', ['tag_id' => 'id']);
    }

}