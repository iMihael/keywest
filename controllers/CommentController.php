<?php

namespace app\controllers;

use app\models\Comment;
use yii\web\NotFoundHttpException;

class CommentController extends BaseController {
    public $modelClass = 'app\models\Comment';

    public function actionAdd($uid) {
        $model = new Comment();
        $model->bookmark_id = $uid;
        if($model->load(\Yii::$app->request->post(), '') && $model->validate()) {
            $model->save();
        }
        return $model;
    }

    public function actionUpdate($uid) {
        if($comment = Comment::findOne($uid)) {
            $comment->setScenario('update');
            $comment->text = \Yii::$app->request->post('text');
            if($comment->validate()) {
                $comment->save();
            }

            return $comment;
        }

        throw new NotFoundHttpException();
    }

    public function actionDelete($uid) {
        if($comment = Comment::findOne($uid)) {
            $comment->setScenario('update');
            if($comment->validate()) {
                $comment->delete();
            }
        }

        \Yii::$app->response->statusCode = 204;
    }
}