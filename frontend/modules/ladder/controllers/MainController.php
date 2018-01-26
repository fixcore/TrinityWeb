<?php

namespace frontend\modules\ladder\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

class MainController extends Controller
{
    /**
     * @return string|\yii\web\Response
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}