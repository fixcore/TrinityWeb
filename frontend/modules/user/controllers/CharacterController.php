<?php

namespace frontend\modules\user\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\helpers\Url;

use frontend\modules\user\models\SelectCharacterForm;

class CharacterController extends Controller
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
    public function actionChange()
    {
        if($post = Yii::$app->request->post()) {
            $model = new SelectCharacterForm();
            if($model->load($post) && $model->validate()) {
                $model->confirm();
            }
        }
        return $this->redirect(Yii::$app->request->referrer ? Yii::$app->request->referrer : Url::to(['/user/main']));
    }
}
