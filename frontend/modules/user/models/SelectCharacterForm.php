<?php

namespace frontend\modules\user\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

use common\models\chars\Characters;

/**
 * Select character form
 */
class SelectCharacterForm extends Model
{
    /**
     * @var user character_id
     */
    public $character_id;
    
    public function __construct($config = array()) {
        parent::__construct($config);
        
        if(Yii::$app->user->identity->character_id) {
            $this->character_id = Yii::$app->user->identity->character_id;
        }
        
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['character_id','required'],
            ['character_id','integer']
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'character_id' => Yii::t('common', 'Персонаж')
        ];
    }
    
    public function characters() {
        return ArrayHelper::map(Characters::getList(),'guid','name');
    }
    
    public function confirm() {
        if(Yii::$app->user->identity->HasCharacterByGuid($this->character_id)) {
            Yii::$app->user->identity->character_id = $this->character_id;
            Yii::$app->user->identity->save();
            Yii::$app->session->setFlash('success',Yii::t('cp','Выбраный персонаж успешно изменён'));
        } else {
            Yii::$app->session->setFlash('error',Yii::t('cp','При выборе персонажа произошла ошибка - персонаж не найден'));
        }
    }
}