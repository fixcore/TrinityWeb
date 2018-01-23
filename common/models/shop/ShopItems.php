<?php

namespace common\models;

use Yii;
use yii\data\ActiveDataProvider;

use common\models\armory\ArmoryItemTemplate;

/**
 * This is the model class for table "web_shop_items".
 *
 * @property integer $id
 * @property integer $category_id
 * @property integer $type
 * @property double $discount
 * @property string $name
 * @property integer $item_id
 * @property integer $cost
 * @property integer $server_id
 * @property string $discount_end
 *
 * @property relationShopCategory $category
 * @property realtionShopPackItems[] $shopPackItems
 */
class ShopItems extends \yii\db\ActiveRecord
{
    
    const TYPE_OTHER = 0;
    const TYPE_GAME_ITEM = 1;
    const TYPE_GAME_VALUTE = 2;
    const TYPE_GAME_TITLE = 3;
    const TYPE_PACK = 4;
    const TYPE_ACCOUNT = 5;
    
    public $package = [];
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shop_items}}';
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id'], 'required'],
            [['category_id', 'type', 'item_id', 'cost','server_id'], 'integer'],
            [['discount'], 'number'],
            [['name'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShopCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['discount_end','package'],'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('shop', 'ID'),
            'category_id' => Yii::t('shop', 'ID категории'),
            'type' => Yii::t('shop', 'Тип'),
            'discount' => Yii::t('shop', '% скидки'),
            'name' => Yii::t('shop', 'Наименование'),
            'item_id' => Yii::t('shop', 'ID вещи'),
            'cost' => Yii::t('shop', 'Цена'),
            'server_id' => Yii::t('shop', 'Сервер'),
            'discount_end' => Yii::t('shop', 'Дата окончания скидки'),
            'package' => Yii::t('shop', 'Что входит в набор'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelationCategory()
    {
        return $this->hasOne(ShopCategory::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelationShopPackItems()
    {
        return $this->hasMany(ShopPackItems::className(), ['external_id' => 'id']);
    }
    
    public function getRelationIssetPacks() {
        return $this->hasMany(ShopPackItems::className(),['shop_element_id' => 'id']);
    }
    
    public function getType() {
        foreach($this->getTypes() as $id => $type) {
            if($id == $this->type) return $type;
        }
    }
    
    public function getTypes() {
        return [
            Yii::t('shop','Другое'),
            Yii::t('shop','Игровая вещь'),
            Yii::t('shop','Игровая валюта'),
            Yii::t('shop','Звание в игре'),
            Yii::t('shop','Набор товаров/услуг'),
            Yii::t('shop','Для учётной записи'),
        ];
    }
    
    public function listView($params) {
        $query = ShopItems::find();
        $this->load($params);
        
        $query->andWhere(['server_id' => ['',Yii::$app->user->identity->realm_id]]);
        
        if($this->type) {
            $query->andWhere(['type' => $this->type]);
        }
        if($this->cost) {
            $query->andWhere(['cost' => $this->cost]);
        }
        if($this->category_id) {
            $query->andWhere(['category_id' => $this->category_id]);
        }
        if($this->item_id) {
            $query->andWhere(['item_id' => $this->item_id]);
        }
        if($this->name) {
            $query->andWhere(['like','name', $this->name]);
        }
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> [
                'defaultOrder' => ['id' => SORT_DESC]
            ]
        ]);
        return $dataProvider;
    }
    
    public function search($params) {
        $query = ShopItems::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> [
                'defaultOrder' => ['id' => SORT_DESC]
            ]
        ]);
        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }
        if($this->discount_end === '') $this->discount_end = null;
        $query->andFilterWhere([
            'type' => $this->type,
            'discount' => $this->discount,
            'discount_end' => $this->discount_end,
            'item_id' => $this->item_id,
            'cost' => $this->cost,
            'server_id' => $this->server_id,
            'category_id' => $this->category_id,
        ]);
        $query->andFilterWhere(['like', 'name', $this->name]);
        return $dataProvider;
    }

    public function getShopItemNameById($id) {
        $model = ShopItems::findOne($id);
        return $model ? $model->name : '';
    }

    public function savePackage() {
        $exist = $this->relationShopPackItems;
        if($this->type == ShopItems::TYPE_PACK) {   
            foreach($this->package as $item) {
                $find = false;
                if($exist) {
                    foreach($exist as $key => $pack_item) {
                        if($item['id'] == $pack_item->id) {
                            $pack_item->shop_element_id = $item['shop_element_id'];
                            $pack_item->save();
                            $find = true;
                            unset($exist[$key]);
                            break;
                        }
                    }

                }
                if($find === false) {
                    $pack_item = new ShopPackItems();
                    $pack_item->external_id = $this->id;
                    $pack_item->shop_element_id = $item['shop_element_id'];
                    $pack_item->save();
                }
            }
        }

        if($exist) {
            foreach($exist as $item) {
                $item->delete();
            }
        }
    }
    
    public function getDiscountInfo() {
        if(strtotime($this->discount_end) > time()) {
            return Yii::t('shop',", Скидка ({discount}%) истечёт через - {time_to_end}", [
                'discount' => $this->discount,
                'time_to_end' => date('d:H:i:s',strtotime($this->discount_end) - time()),
            ]);
        } else {
            return false;
        }
    }
    public function getCost() {
        
        if(strtotime($this->discount_end) > time())
            $cost = $this->cost * ( 1 - ($this->discount / 100));
        else
            $cost = $this->cost;
        
        return $cost;
    }
    
    public function getRelationItemInfo() {
        return $this->hasOne(ArmoryItemTemplate::className(),['entry' => 'item_id']);
    }
    
}