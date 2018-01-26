<?php

namespace frontend\modules\armory\controllers;

use Yii;
use yii\web\Controller;

use frontend\modules\armory\models\SearchForm;

class MainController extends Controller
{
    /**
     * @return string|\yii\web\Response
     */
    public function actionIndex()
    {
        $searchModel = new SearchForm();
        
        $data = $searchModel->findCharacters(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'searchResult' => $data['result'],
            'counter' => $data['counter']
        ]);
    }
}