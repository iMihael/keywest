<?php

namespace app\controllers;

use app\models\Bookmark;
use yii\data\ActiveDataProvider;

class BookmarkController extends BaseController {
    public $modelClass = 'app\models\Bookmark';

    public function actionAdd() {
        if($url = \Yii::$app->request->post('url')) {
            return Bookmark::createByUrl($url);
        }
    }

    public function actionLatest() {
//        return new ActiveDataProvider([
//            'query' => Bookmark::find()->orderBy('created_at DESC')->limit(10)
//        ]);

        return Bookmark::find()
            ->orderBy('created_at DESC')
            ->limit(10)
            ->all();
    }

    public function actionGet($uid) {
        return Bookmark::find()
            ->with('comments')
            ->asArray()
            ->where(['id' => $uid])
            ->one();
    }


}