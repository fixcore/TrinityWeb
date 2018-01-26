<?php

namespace common\models\chars;

use Yii;

use common\core\models\characters\CoreModel;

/**
 * This is the model class for table "character_inventory".
 *
 * @property integer $guid
 * @property integer $bag
 * @property integer $slot
 * @property integer $item
 */
class CharacterInventory extends CoreModel
{
    public static function tableName()
    {
        return 'character_inventory';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guid', 'bag', 'slot', 'item'], 'integer'],
            [['item'], 'required'],
            [['guid', 'bag', 'slot'], 'unique', 'targetAttribute' => ['guid', 'bag', 'slot'], 'message' => 'The combination of Guid, Bag and Slot has already been taken.'],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'guid' => Yii::t('app', 'Guid'),
            'bag' => Yii::t('app', 'Bag'),
            'slot' => Yii::t('app', 'Slot'),
            'item' => Yii::t('app', 'Item'),
        ];
    }
    /**
    * Связь для получения объекта содержащего данные о вещи из инвенторя персонажа. Поля выдачи {guid | itemEntry | enchantments}
    * @return \yii\db\ActiveQuery
    */
    public function getRelationItemInstance() {
        return $this->hasOne(ItemInstance::className(),['guid' => 'item'])->select(['guid','itemEntry','enchantments']);
    }
    
}
