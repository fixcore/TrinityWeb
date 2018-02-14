<?php

namespace frontend\modules\ladder\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

use frontend\modules\ladder\models\SearchFormModel;

class MainController extends Controller
{
    
    public function beforeAction($action) {
        if(parent::beforeAction($action)) {
            $server = Yii::$app->request->get('server');
            $type = Yii::$app->request->get('type');
            if(!$server || !$type) {
                $user_realm = Yii::$app->CharactersDbHelper->getServerNameById(Yii::$app->CharactersDbHelper->getServerId());
                $type = SearchFormModel::TYPE_2;
                $this->redirect(['/ladder/main/index', 'server' => $user_realm, 'type' => $type]);
                return false;
            }
            return true;
        }
        return false;
    }
    
    /**
     * @return string|\yii\web\Response
     */
    public function actionIndex($server = '',$type = '')
    {
        $data = Yii::$app->cache->get(Yii::$app->request->getUrl());
        
        $formModel = new SearchFormModel();
        $formModel->load(Yii::$app->request->queryParams);
        
        if($data === false) {
            $dataProvider = $formModel->search(Yii::$app->request->queryParams);
            $data['list'] = $dataProvider->getModels();
            $data['totalCount'] = $dataProvider->totalCount;
            $data['pageSize'] = $dataProvider->pagination->getPageSize();
            if($dataProvider->pagination->getPage() === 0) {
                $data['rank_start'] = 1;
            } else {
                if($dataProvider->pagination->getPage() - 1 > 0) {
                    $data['rank_start'] = $data['pageSize'] * ($dataProvider->pagination->getPage() - 1);
                } else {
                    $data['rank_start'] = ++$data['pageSize'];
                }
            }
            Yii::$app->cache->set(Yii::$app->request->getUrl(),$data,Yii::$app->keyStorage->get('frontend.cache_ladder'));
        }
        
        return $this->render('index', [
            'data' => $data,
            'searchModel' => $formModel,
        ]);
    }
}