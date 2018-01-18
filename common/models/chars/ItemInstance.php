<?php

namespace common\models\chars;

use Yii;

use common\core\models\characters\CoreModel;

/**
 * This is the model class for table "item_instance".
 *
 * @property integer $guid
 * @property integer $itemEntry
 * @property integer $owner_guid
 * @property integer $creatorGuid
 * @property integer $giftCreatorGuid
 * @property integer $count
 * @property integer $duration
 * @property string $charges
 * @property integer $flags
 * @property string $enchantments
 * @property integer $randomPropertyId
 * @property integer $durability
 * @property integer $playedTime
 * @property string $text
 */
class ItemInstance extends CoreModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item_instance';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guid', 'enchantments'], 'required'],
            [['guid', 'itemEntry', 'owner_guid', 'creatorGuid', 'giftCreatorGuid', 'count', 'duration', 'flags', 'randomPropertyId', 'durability', 'playedTime'], 'integer'],
            [['charges', 'enchantments', 'text'], 'string'],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'guid' => Yii::t('app', 'Guid'),
            'itemEntry' => Yii::t('app', 'Item Entry'),
            'owner_guid' => Yii::t('app', 'Owner Guid'),
            'creatorGuid' => Yii::t('app', 'Creator Guid'),
            'giftCreatorGuid' => Yii::t('app', 'Gift Creator Guid'),
            'count' => Yii::t('app', 'Count'),
            'duration' => Yii::t('app', 'Duration'),
            'charges' => Yii::t('app', 'Charges'),
            'flags' => Yii::t('app', 'Flags'),
            'enchantments' => Yii::t('app', 'Enchantments'),
            'randomPropertyId' => Yii::t('app', 'Random Property ID'),
            'durability' => Yii::t('app', 'Durability'),
            'playedTime' => Yii::t('app', 'Played Time'),
            'text' => Yii::t('app', 'Text'),
        ];
    }
    /**
    * Связь для получения объекта содержащего данные о вещи из БД Armory
    * @return \yii\db\ActiveQuery
    */
    public function getArmoryItem() {
        return $this->hasOne(ArmoryItemTemplate::className(),['entry' => 'itemEntry'])->select(['displayid','entry']);
    }
    
}
