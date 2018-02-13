<?php

namespace frontend\modules\ladder\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

use common\models\chars\ArenaTeam;

class TeamController extends Controller
{
    public function beforeAction($action) {
        if(parent::beforeAction($action)) {
            Yii::$app->params['breadcrumbs'][] = ['label' => Yii::$app->CharactersDbHelper->getServerNameById(Yii::$app->CharactersDbHelper->getServerFromGet())];
            return true;
        }
        return false;
    }
    
    /**
     * @return string|\yii\web\Response
     */
    public function actionIndex($server = '',$teamId = '')
    {
        $data = Yii::$app->cache->get(Yii::$app->request->getUrl());
        if($data === false) {
            $data = ArenaTeam::find()->where(['arenaTeamId' => $teamId])->with([
                'relationMembers.relationCharacter.relationArenaStats'
            ])->one();
            Yii::$app->params['breadcrumbs'][] = ['label' => $data['name']];
            Yii::$app->cache->set(Yii::$app->request->getUrl(),$data,Yii::$app->keyStorage->get('frontend.cache_ladder'));
        }
        return $this->render('index',[
            'data' => $data,
        ]);
    }
}