<?php

namespace common\models\armory;

use Yii;

/**
 * This is the model class for table "armory_achievement".
 *
 * @property integer $id
 * @property integer $factionFlag
 * @property integer $parentAchievement
 * @property string $name_de_de
 * @property string $name_zh_cn
 * @property string $name_en_gb
 * @property string $name_es_es
 * @property string $name_fr_fr
 * @property string $name_ru_ru
 * @property string $description_de_de
 * @property string $description_zh_cn
 * @property string $description_en_gb
 * @property string $description_es_es
 * @property string $description_fr_fr
 * @property string $description_ru_ru
 * @property integer $categoryId
 * @property integer $points
 * @property integer $OrderInCategory
 * @property integer $flags
 * @property integer $iconID
 * @property string $iconname
 * @property string $titleReward_de_de
 * @property string $titleReward_zh_cn
 * @property string $titleReward_en_gb
 * @property string $titleReward_es_es
 * @property string $titleReward_fr_fr
 * @property string $titleReward_ru_ru
 * @property integer $dungeonDifficulty
 */
class ArmoryAchievement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'armory_achievement';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('armory_db');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'factionFlag', 'parentAchievement', 'name_de_de', 'name_zh_cn', 'name_en_gb', 'name_es_es', 'name_fr_fr', 'name_ru_ru', 'description_de_de', 'description_zh_cn', 'description_en_gb', 'description_es_es', 'description_fr_fr', 'description_ru_ru', 'categoryId', 'points', 'OrderInCategory', 'flags', 'iconID', 'iconname', 'titleReward_de_de', 'titleReward_zh_cn', 'titleReward_en_gb', 'titleReward_es_es', 'titleReward_fr_fr', 'titleReward_ru_ru'], 'required'],
            [['id', 'factionFlag', 'parentAchievement', 'categoryId', 'points', 'OrderInCategory', 'flags', 'iconID', 'dungeonDifficulty'], 'integer'],
            [['name_de_de', 'name_zh_cn', 'name_en_gb', 'name_es_es', 'name_fr_fr', 'name_ru_ru', 'description_de_de', 'description_zh_cn', 'description_en_gb', 'description_es_es', 'description_fr_fr', 'description_ru_ru', 'titleReward_de_de', 'titleReward_zh_cn', 'titleReward_en_gb', 'titleReward_es_es', 'titleReward_fr_fr', 'titleReward_ru_ru'], 'string'],
            [['iconname'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'factionFlag' => Yii::t('common', 'Faction Flag'),
            'parentAchievement' => Yii::t('common', 'Parent Achievement'),
            'name_de_de' => Yii::t('common', 'Name De De'),
            'name_zh_cn' => Yii::t('common', 'Name Zh Cn'),
            'name_en_gb' => Yii::t('common', 'Name En Gb'),
            'name_es_es' => Yii::t('common', 'Name Es Es'),
            'name_fr_fr' => Yii::t('common', 'Name Fr Fr'),
            'name_ru_ru' => Yii::t('common', 'Name Ru Ru'),
            'description_de_de' => Yii::t('common', 'Description De De'),
            'description_zh_cn' => Yii::t('common', 'Description Zh Cn'),
            'description_en_gb' => Yii::t('common', 'Description En Gb'),
            'description_es_es' => Yii::t('common', 'Description Es Es'),
            'description_fr_fr' => Yii::t('common', 'Description Fr Fr'),
            'description_ru_ru' => Yii::t('common', 'Description Ru Ru'),
            'categoryId' => Yii::t('common', 'Category ID'),
            'points' => Yii::t('common', 'Points'),
            'OrderInCategory' => Yii::t('common', 'Order In Category'),
            'flags' => Yii::t('common', 'Flags'),
            'iconID' => Yii::t('common', 'Icon ID'),
            'iconname' => Yii::t('common', 'Iconname'),
            'titleReward_de_de' => Yii::t('common', 'Title Reward De De'),
            'titleReward_zh_cn' => Yii::t('common', 'Title Reward Zh Cn'),
            'titleReward_en_gb' => Yii::t('common', 'Title Reward En Gb'),
            'titleReward_es_es' => Yii::t('common', 'Title Reward Es Es'),
            'titleReward_fr_fr' => Yii::t('common', 'Title Reward Fr Fr'),
            'titleReward_ru_ru' => Yii::t('common', 'Title Reward Ru Ru'),
            'dungeonDifficulty' => Yii::t('common', 'Dungeon Difficulty'),
        ];
    }
}