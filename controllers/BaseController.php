<?php

namespace app\controllers;
use Yii;
use yii\web\NotFoundHttpException;

class BaseController extends \yii\rest\Controller {
    public function checkAccess($action, $model = null, $params = []) {
        throw new NotFoundHttpException();
    }

    public function init() {
        Yii::$app->response->headers->add('Access-Control-Allow-Origin', "http://swagger.io");
        Yii::$app->response->headers->add('Access-Control-Allow-Headers', 'Origin, X-Requested-With, Content-Type, Accept');
        parent::init();
    }
}