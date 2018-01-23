<?php

namespace common\models\shop;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "web_shop_category".
 *
 * @property integer $id
 * @property integer $root
 * @property integer $lvl
 * @property string $icon
 * @property integer $icon_type
 * @property integer $active
 * @property integer $visible
 * @property integer $disabled
 * @property integer $selected
 * @property integer $readonly
 * @property integer $collapsed
 * @property integer $movable_d
 * @property integer $movable_u
 * @property integer $movable_l
 * @property integer $movable_r
 * @property integer $removable
 * @property integer $removable_all
 * @property string $name
 * @property double $discount
 * @property string $discount_end
 * @property integer $lft
 * @property integer $rgt
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property relationShopItems[] $shopItems
 */
class ShopCategory extends \kartik\tree\models\Tree
{
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shop_category}}';
    }
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                TimestampBehavior::className(),
            ]
        );
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['root', 'lvl', 'icon_type', 'active', 'visible', 'disabled', 'selected', 'readonly', 'collapsed', 'movable_d', 'movable_u', 'movable_l', 'movable_r', 'removable', 'removable_all', 'lft', 'rgt', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'required'],
            [['discount'], 'number'],
            [['icon', 'name'], 'string', 'max' => 255],
            [['discount_end'],'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('shop', 'ID'),
            'root' => Yii::t('shop', 'Root'),
            'lvl' => Yii::t('shop', 'Lvl'),
            'icon' => Yii::t('shop', 'Icon'),
            'icon_type' => Yii::t('shop', 'Icon Type'),
            'active' => Yii::t('shop', 'Active'),
            'visible' => Yii::t('shop', 'Visible'),
            'disabled' => Yii::t('shop', 'Disabled'),
            'selected' => Yii::t('shop', 'Selected'),
            'readonly' => Yii::t('shop', 'Readonly'),
            'collapsed' => Yii::t('shop', 'Collapsed'),
            'movable_d' => Yii::t('shop', 'Movable D'),
            'movable_u' => Yii::t('shop', 'Movable U'),
            'movable_l' => Yii::t('shop', 'Movable L'),
            'movable_r' => Yii::t('shop', 'Movable R'),
            'removable' => Yii::t('shop', 'Removable'),
            'removable_all' => Yii::t('shop', 'Removable All'),
            'name' => Yii::t('shop', 'Наименование категории'),
            'discount' => Yii::t('shop', '% скидки'),
            'discount_end' => Yii::t('shop', 'Окончание скидки'),
            'lft' => Yii::t('shop', 'Lft'),
            'rgt' => Yii::t('shop', 'Rgt'),
            'created_at' => Yii::t('shop', 'Создан'),
            'updated_at' => Yii::t('shop', 'Изменён'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelationShopItems()
    {
        return $this->hasMany(ShopItems::className(), ['category_id' => 'id']);
    }
    
    public function getRelationChilds() {
        return $this->hasMany(ShopCategory::className(),['root' => 'id'])->andWhere(['!=','lvl',0])->orderBy(['lft' => SORT_ASC]);
    }
    
    public function generateAdminMenu() {
        //todo
        return [];
    }
    
    public function generateShopMenu($model = null) {
        if(!$model) {
            $models = self::find()->where(['lvl' => 0])->orderBy(['lft' => SORT_ASC])->all();
        } else {
            $models = $model->relationChilds;
        }
        $items = [];
        foreach($models as $_model) {
            
            $childs_array = self::generateShopMenu($_model);
            
            $items[$_model->id] = [
                'label' => Yii::t('shop', $_model->name),
                'url' => ['index','ShopItems[category_id]' => $_model->id],
                'items' => $childs_array ? $childs_array : [],
            ];
        }
        return $items;
    }
    
}