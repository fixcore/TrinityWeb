<?php

namespace frontend\modules\armory\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

use common\models\chars\Characters;

/**
 * SearchForm
 */
class SearchForm extends Model
{
    public $realm_id;
    public $query = '';
    
    public function __construct($config = array()) {
        parent::__construct($config);
        $this->realm_id = Yii::$app->CharactersDbHelper->getServerId();
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['realm_id', 'query'], 'required'],
            ['realm_id', 'integer'],
            ['query', 'string', 'min' => 2],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'realm_id' => Yii::t('common', 'Игровой мир'),
            'query' => Yii::t('armory', 'Найти персонажа'),
        ];
    }
    
    public function findCharacters($params) {
        
    }
    
}
