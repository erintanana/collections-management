<?php

namespace app\models;

use yii\db\ActiveRecord;

class Person extends ActiveRecord
{

    public function rules()
    {
        return [
            ['name', 'required'],
            ['surname', 'required'],
            ['date_of_birth', 'required'],
        ];
    }

}
