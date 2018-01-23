<?php

namespace common\models\shop;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "web_shop_basket".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $shop_element_id
 * @property integer $count
 */
class ShopBasket extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shop_basket}}';
    }
    
    public function __construct($config = array()) {
        parent::__construct($config);
        $this->user_id = Yii::$app->user->getId();
        $this->count = 1;
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'shop_element_id'], 'required'],
            [['user_id', 'shop_element_id','count'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('shop', 'ID'),
            'user_id' => Yii::t('shop', 'ID пользователя'),
            'shop_element_id' => Yii::t('shop', 'Товар/услуга'),
            'count' => Yii::t('shop', 'Кол-во'),
        ];
    }
    
    public function getRelationShopItem() {
        return $this->hasOne(ShopItems::className(),['id' => 'shop_element_id']);
    }
    
    public function search($params) {
        $query = self::find()->where(['user_id' => Yii::$app->user->getId()])->with(['relationShopItem']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ],
            'sort'=> [
                'defaultOrder' => ['id' => SORT_DESC]
            ]
        ]);
        return $dataProvider;
    }
    
    public function push($user_id, $element_id, $count = 1) {
        //todo
    }
    
    public function calculate() {
        $total_cost = 0;
        //todo
        return $total_cost;
    }
}