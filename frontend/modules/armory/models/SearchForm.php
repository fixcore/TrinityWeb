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
    
    const PAGE_SIZE = 5;
    
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
            ['query', 'trim'],
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
			'query' => Characters::find()->where([
                    'like',
                    'LOWER(name)',
                    mb_strtolower($this->query)
                ])->orderBy(['guid' => SORT_DESC])->with(['relationGuild.relationGuild'])->asArray(),
			'pagination' => [
				'pageSize' => SearchForm::PAGE_SIZE,
			],
		]);
        $data = Yii::$app->cache->get(Yii::$app->request->url);
        $counter = Yii::$app->cache->get(Yii::$app->request->url . '_counter');
        if($this->query) {    
            if($data === false || $counter === false) {
                $data = $dataProvider->getModels();
                $counter = $dataProvider->getTotalCount();
                Yii::$app->cache->set(Yii::$app->request->url . '_counter',$counter,Yii::$app->keyStorage->get('frontend.cache_armory_search'));
                Yii::$app->cache->set(Yii::$app->request->url,$data,Yii::$app->keyStorage->get('frontend.cache_armory_search'));
            }
        }
        return ['result' => $data, 'counter' => $counter];
    }
    
    public function formName() {return '';}
    
}
