<?php

namespace common\models\shop;

use Yii;

/**
 * This is the model class for table "web_shop_pack_items".
 *
 * @property integer $id
 * @property integer $external_id
 * @property integer $shop_element_id
 *
 * @property ShopItems $shopElement
 */
class ShopPackItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shop_pack_items}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_element_id', 'external_id'], 'integer'],
            [['shop_element_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShopItems::className(), 'targetAttribute' => ['shop_element_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('shop', 'ID'),
            'external_id' => Yii::t('shop', 'Внешний ключ'),
            'shop_element_id' => Yii::t('shop', 'Товар/услуга'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelationShopElement()
    {
        return $this->hasOne(ShopItems::className(), ['id' => 'shop_element_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelationShopPack() {
        return $this->hasOne(Shopitems::className(),['id' => 'external_id']);
    }
    
}