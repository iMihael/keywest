<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property integer $id
 * @property string $created_at
 * @property string $ip
 * @property string $text
 * @property integer $bookmark_id
 *
 * @property Bookmark $bookmark
 */
class Comment extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['created_at'], 'safe'],
            [['text'], 'string'],
            [['bookmark_id'], 'integer'],
            [['ip'], 'string', 'max' => 32],
            [['bookmark_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bookmark::className(), 'targetAttribute' => ['bookmark_id' => 'id']],
            ['ip', 'ownerNotExpired', 'on' => 'update'],
        ];
    }

    public function ownerNotExpired() {
        if($this->ip != Yii::$app->request->userIP) {
            $this->addError('ip', 'Wrong ip address');
        }

        $created = new \DateTime($this->created_at);
        if(time() - $created->getTimestamp() > 3600) {
            $this->addError('created_at', 'Update time exceed');
        }
    }

    public function beforeSave($insert) {
        $this->ip = Yii::$app->request->userIP;
        return parent::beforeSave($insert);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'ip' => 'Ip',
            'text' => 'Text',
            'bookmark_id' => 'Bookmark ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookmark()
    {
        return $this->hasOne(Bookmark::className(), ['id' => 'bookmark_id']);
    }

    public function fields() {
        return [
            'uid' => function($model){
                return $model->id;
            },
            'text'
        ];
    }
}
