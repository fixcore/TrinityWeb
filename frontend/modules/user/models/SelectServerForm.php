<?php

namespace frontend\modules\user\models;

use Yii;
use yii\base\Model;

/**
 * Select server form
 */
class SelectServerForm extends Model
{
    /**
     * @var user realm_id
     */
    public $realm_id;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['realm_id', 'required'],
            ['realm_id', 'integer'],
        ];
    }
    
    public function __construct($config = array()) {
        parent::__construct($config);
        
        if(Yii::$app->user->identity->realm_id) {
            $this->realm_id = Yii::$app->user->identity->realm_id;
        }
        
    }
    
    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'realm_id' => Yii::t('common', 'Игровой мир')
        ];
    }
    
    public function confirm() {
        if(Yii::$app->CharactersDbHelper->isServerExist($this->realm_id)) {
            Yii::$app->CharactersDbHelper->setServerValue($this->realm_id);
            Yii::$app->session->setFlash('success',Yii::t('cp','Сервер успешно изменён, выбраный персонаж сброшен'));
        } else {
            Yii::$app->session->setFlash('error',Yii::t('cp','При изменении игрового мира произошла ошибка - игровой мир не найден'));
        }
    }
}
