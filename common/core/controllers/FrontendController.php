<?php

namespace common\core\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class FrontendController extends Controller
{
    public function beforeAction($action) {
        /*Опеределяем сервер для пользователя - если у него его нет*/
        Yii::$app->CharactersDbHelper->setDefault();
        
        parent::beforeAction($action);
        return $this;
    }
}