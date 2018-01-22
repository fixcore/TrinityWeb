<?php

namespace frontend\modules\user\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

use common\models\auth\search\LogsIpActionsSearch;

class LogsController extends Controller
{

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ]
        ];
    }
    
    /**
     * @return string|\yii\web\Response
     */
    public function actionIndex()
    {
        
        Yii::$app->params['breadcrumbs'][] = [
            'label' => Yii::t('cp','История учётной записи')
        ];
        
        $account_logs_provider = [];
        
        $game_logs_model = new LogsIpActionsSearch();
        $game_logs_provider = $game_logs_model->search(Yii::$app->request->queryParams);
        
        if(Yii::$app->request->isPjax) {
            return $this->renderAjax('index', [
                'game_logs_provider' => $game_logs_provider,
                'account_logs_provider' => $account_logs_provider,
                'game_logs_model' => $game_logs_model,
            ]);
        }
        return $this->render('index', [
            'game_logs_provider' => $game_logs_provider,
            'account_logs_provider' => $account_logs_provider,
            'game_logs_model' => $game_logs_model,
        ]);
    }
}
