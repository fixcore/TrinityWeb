<?php

namespace common\core\models\characters;

use Yii;
use yii\db\ActiveRecord;
use yii\web\BadRequestHttpException;

class CoreModel extends ActiveRecord
{
    /**
    * Получение подключения к БД исходя из запроса
    * @param integer $server_id Опициально - индекс сервера
    * @return yii\db\Connection
    */
    public static function getDb($server_id = null) {
        if($server_id == null) {
            $server_name = null;
            if($server_name = Yii::$app->request->get('server')) {
                $server_id = Yii::$app->CharactersDbHelper->getServerIdByName($server_name);
                if($server_id === null) {
                    throw new BadRequestHttpException(Yii::t('common','Запрашиваемый сервер не существует'));
                }
            } else {
                if(Yii::$app->user->isGuest) {
                    $server_id = Yii::$app->CharactersDbHelper->setDefault();
                } else {
                    $server_id = Yii::$app->user->identity->realm_id;
                    if(empty($server_id)) {
                        if($id = Yii::$app->CharactersDbHelper->setDefault()) {
                            $server_id = $id;
                        } else {
                            throw new BadRequestHttpException(Yii::t('common','Возникли ошибки с выбором сервера'));
                        }
                    }
                }
            }
        }
        return Yii::$app->CharactersDbHelper->getConnection($server_id);
    }
}