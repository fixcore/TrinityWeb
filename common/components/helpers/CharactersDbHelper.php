<?php

namespace common\components\helpers;

use Yii;
use yii\helpers\ArrayHelper;
use yii\web\BadRequestHttpException;

use common\models\auth\Realmlist;

class CharactersDbHelper extends \yii\base\Component
{
    /**
    * Получение правильно БД исходя из запроса
    * @param integer $server_id индекс сервера
    * @return \yii\db\Connection
    */
    public function getConnection($server_id = null) {
        if($server_id) {
            try {
                return Yii::$app->get('char_' . $server_id);
            } catch (\Exception $exc) {
                throw new BadRequestHttpException(Yii::t('app','Ошибка подключения к {server_id}', [
                    'server_id' => $server_id
                ]));
            }
        } else {
            throw new BadRequestHttpException(Yii::t('app','Ошибка - сервера не существует'));
        }
    }
    /**
    * Получение БД исходя из индекса сервера
    * @param integer $server_id индекс сервера
    * @return \yii\db\Connection
    */
    public function getDb($server_id) {return Yii::$app->get('char_' . $server_id);}
    /**
    * Установить индекс сервера для текущего пользователя
    * @param integer $server_id индекс сервера
    * @return bool = false | integer
    */
    public function setServerValue($server_id) {
        if(self::isServerExist($server_id)) {
            if(Yii::$app->user->isGuest) {
                Yii::$app->response->cookies->add(new \yii\web\Cookie([
                'name' => 'selected_server',
                    'value' => $server_id
                ]));
            } else {
                Yii::$app->user->identity->realm_id = $server_id;
                Yii::$app->user->identity->character_id = null;
                Yii::$app->user->identity->save();
            }
            return $server_id;
        }
        return false;
    }
    /**
    * Установить индекс сервера для текущего пользователя поумолчанию либо возвращает текущий сервер у пользователя
    * @return bool = false | integer
    */
    public function setDefault() {
        if(Yii::$app->user->isGuest) {
            if($server_id = Yii::$app->request->cookies->getValue('selected_server')) return $server_id;
            $server_data = $this::getServers()[0];
            if($server_data && $server_data['id']) {
                if($_id = $this::setServerValue($server_data['id'])) return $_id;
            } else {
                return null;
            }
        } else {
            if(!Yii::$app->user->identity->realm_id) {
                $model = Realmlist::find()->orderBy(['id' => SORT_ASC])->one();
                if($model) {
                    if($_id = $this::setServerValue($model->id)) return $_id;
                } else {
                    return null;
                }
            }
            return Yii::$app->user->identity->realm_id;
        }
        return null;
    }
    /**
    * Получить индекс сервера по его названию
    * @param string $name Наименование сервера
    * @return integer | null
    */
    public function getServerIdByName($name) {
        $model = Realmlist::find()->where(['name' => $name])->one();
        if($model) {
            return $model->id;
        }
        return null;
    }
    /**
    * Получить наименование сервера по его индексу
    * @param integer $server_id Индекс сервера
    * @return string | null
    */
    public function getServerNameById($server_id) {
        $data = $this::getServers(true);
        return $data[$server_id] ? $data[$server_id] : null;
    }
    /**
    * Получить список серверов
    * @param bool $as_associated Вернуть как ключ => значение
    * @return array
    */
    public function getServers($as_associated = false) {
        $data = [];
        if($as_associated == true) {
            $cache_key = 'associated-servers';
            $data = Yii::$app->cache->get($cache_key);
            if($data === false) {
                $data = ArrayHelper::map(Realmlist::find()->asArray()->all(),'id', 'name');
                Yii::$app->cache->set($cache_key,$data);
            }
        } else {
            $cache_key = 'array_servers';
            $data = Yii::$app->cache->get($cache_key);
            if($data === false) {
                $data = Realmlist::find()->asArray()->all();
                Yii::$app->cache->set($cache_key,$data);
            }
        }
        return $data;
    }
    /**
    * Проверка на то что сервер существует
    * @param integer $server_id индекс сервера
    * @return bool
    */
    public function isServerExist($server_id) {
        foreach($this::getServers(true) as $id => $server_name) {
            if($id == $server_id) return true;
        }
        return false;
    }
    /**
    * Получение индекса сервера из _GET
    * @return integer | null
    */
    public function getServerFromGet() {
        $name = Yii::$app->request->get('server');
        foreach($this::getServers(true) as $server_id => $server_name) {
            if($name == $server_name) return $server_id;
        }
        return null;
    }
    
}