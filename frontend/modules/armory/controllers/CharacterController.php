<?php

namespace frontend\modules\armory\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;

use common\models\chars\Characters;

class CharacterController extends Controller
{   
    
    public function beforeAction($action) {
        $parent = parent::beforeAction($action);
        if(!Characters::find()->where(['name' => Yii::$app->request->get('character')])->exists()) {
            Yii::$app->session->setFlash('error',Yii::t('armory','Персонаж не найден!'));
            $this->redirect(Yii::$app->request->referrer ? Yii::$app->request->referrer : Url::to(['/armory']));
            return false;
        }
        return $parent;
    }
    
    /**
     * @return string|\yii\web\Response
     */
    public function actionIndex($server,$character)
    {
        return $this->render('index');
    }
}