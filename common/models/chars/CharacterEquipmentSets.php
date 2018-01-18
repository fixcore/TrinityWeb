<?php

namespace common\models\chars;

use Yii;

use common\core\models\characters\CoreModel;

/**
 * This is the model class for table "character_equipmentsets".
 *
 * @property integer $guid
 * @property string $setguid
 * @property integer $setindex
 * @property string $name
 * @property string $iconname
 * @property integer $ignore_mask
 * @property integer $item0
 * @property integer $item1
 * @property integer $item2
 * @property integer $item3
 * @property integer $item4
 * @property integer $item5
 * @property integer $item6
 * @property integer $item7
 * @property integer $item8
 * @property integer $item9
 * @property integer $item10
 * @property integer $item11
 * @property integer $item12
 * @property integer $item13
 * @property integer $item14
 * @property integer $item15
 * @property integer $item16
 * @property integer $item17
 * @property integer $item18
 */
class CharacterEquipmentSets extends CoreModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'character_equipmentsets';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guid', 'setindex', 'ignore_mask', 'item0', 'item1', 'item2', 'item3', 'item4', 'item5', 'item6', 'item7', 'item8', 'item9', 'item10', 'item11', 'item12', 'item13', 'item14', 'item15', 'item16', 'item17', 'item18'], 'integer'],
            [['name', 'iconname'], 'required'],
            [['name'], 'string', 'max' => 31],
            [['iconname'], 'string', 'max' => 100],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'guid' => Yii::t('app', 'Guid'),
            'setguid' => Yii::t('app', 'Setguid'),
            'setindex' => Yii::t('app', 'Setindex'),
            'name' => Yii::t('app', 'Name'),
            'iconname' => Yii::t('app', 'Iconname'),
            'ignore_mask' => Yii::t('app', 'Ignore Mask'),
            'item0' => Yii::t('app', 'Item0'),
            'item1' => Yii::t('app', 'Item1'),
            'item2' => Yii::t('app', 'Item2'),
            'item3' => Yii::t('app', 'Item3'),
            'item4' => Yii::t('app', 'Item4'),
            'item5' => Yii::t('app', 'Item5'),
            'item6' => Yii::t('app', 'Item6'),
            'item7' => Yii::t('app', 'Item7'),
            'item8' => Yii::t('app', 'Item8'),
            'item9' => Yii::t('app', 'Item9'),
            'item10' => Yii::t('app', 'Item10'),
            'item11' => Yii::t('app', 'Item11'),
            'item12' => Yii::t('app', 'Item12'),
            'item13' => Yii::t('app', 'Item13'),
            'item14' => Yii::t('app', 'Item14'),
            'item15' => Yii::t('app', 'Item15'),
            'item16' => Yii::t('app', 'Item16'),
            'item17' => Yii::t('app', 'Item17'),
            'item18' => Yii::t('app', 'Item18'),
        ];
    }
}
