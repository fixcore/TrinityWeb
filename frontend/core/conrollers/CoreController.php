<?php

namespace frontend\core\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CoreController extends Controller
{
    public function beforeAction($action) {
        parent::beforeAction($action);
    }
}