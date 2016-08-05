<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bookmark".
 *
 * @property integer $id
 * @property string $created_at
 * @property string $url
 *
 * @property Comment[] $comments
 */
class Bookmark extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bookmark';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at'], 'safe'],
            [['url'], 'string', 'max' => 1024],
            ['url', 'url'],
        ];
    }

    public static function createByUrl($url) {
        if($model = Bookmark::findOne(['url' => $url])) {
            return $model;
        }

        $model = new self();
        $model->url = $url;
        if($model->validate()) {
            $model->save();

        }
        return $model;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'url' => 'Url',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['bookmark_id' => 'id']);
    }

    public function fields() {
        return [
            'uid' => function($model) {
                return $model->id;
            },
            'url',
        ];
    }
}
