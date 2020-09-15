<?php

namespace app\models;

use yii\db\ActiveRecord;

class Collection extends ActiveRecord
{
    public function rules(){
        return [
            ['title', 'required'],
            ['topic', 'required'],
            ['description', 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Название',
            'topic' => 'Тема',
            'description' => 'Описание',
        ];
    }

    public function getitems(){
        return $this->hasMany(Item::className(), ['collection_id' => 'id']);
    }

    public function getuser(){
        return $this->hasOne(User::className(), ['id' => 'owner_id']);
    }

    public function newCollection(){
        if (!$this->validate()) {
            return null;
        }

        $collection = new Collection();
        $collection->title = $this->title;
        $collection->topic = $this->topic;
        $collection->description = $this->description;
        $collection->created = date('Y-m-d H:i:s');
        $collection->owner_id = 1;
        return $collection->save();
    }

}