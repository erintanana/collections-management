<?php

namespace app\models;

use yii\db\ActiveRecord;

class Item extends ActiveRecord
{

    public function gettags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])->viaTable('item_tags', ['item_id' => 'id']);
    }

}
