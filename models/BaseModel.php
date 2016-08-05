<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

class BaseModel extends ActiveRecord {
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => false,
                //'value' => new Expression('NOW()'),
                'value' => date('Y-m-d H:i:s'),
            ],
        ];
    }
}