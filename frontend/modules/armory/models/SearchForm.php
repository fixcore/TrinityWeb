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
    public $server;
    public $query = '';
    
    public function __construct($config = array()) {
        parent::__construct($config);
        $this->server = Yii::$app->CharactersDbHelper->getServerName();
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['server', 'query'], 'required'],
            ['server', 'string'],
            ['query', 'string', 'min' => 2],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'server' => Yii::t('common', 'Игровой мир'),
            'query' => Yii::t('armory', 'Строка поиска'),
        ];
    }
    
    public function getServers() {
        $servers = Yii::$app->CharactersDbHelper->getServers(true);
        $data = [];
        foreach($servers as $server) {
            $data[$server] = $server;
        }
        return $data;
    }
    
    public function findCharacters($params) {
        $this->load($params);
        $dataProvider = new ActiveDataProvider([
			'query' => Characters::find()->where(['like','name',$this->query])->orderBy(['guid' => SORT_DESC])->asArray(),
			'pagination' => [
				'pageSize' => 10,
			],
		]);
        $data = Yii::$app->cache->get(Yii::$app->request->url);
        if($data === false) {
            $data = $dataProvider->getModels();
            Yii::$app->cache->set(Yii::$app->request->url,$data,Yii::$app->params['cache_armory_search']);
        }
        return $data;
    }
    
    public function formName() {return '';}
    
}
