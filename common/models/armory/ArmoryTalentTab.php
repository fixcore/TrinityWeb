<?php

namespace common\models\armory;

use Yii;

use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "armory_talenttab".
 *
 * @property integer $id
 * @property string $name_de_de
 * @property string $name_zh_cn
 * @property string $name_en_gb
 * @property string $name_es_es
 * @property string $name_fr_fr
 * @property string $name_ru_ru
 * @property integer $refmask_chrclasses
 * @property integer $tab_number
 */
class ArmoryTalentTab extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'armory_talenttab';
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
            [['id', 'name_de_de', 'refmask_chrclasses', 'tab_number'], 'required'],
            [['id', 'refmask_chrclasses', 'tab_number'], 'integer'],
            [['name_de_de', 'name_zh_cn', 'name_en_gb', 'name_es_es', 'name_fr_fr', 'name_ru_ru'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'name_de_de' => Yii::t('common', 'Name De De'),
            'name_zh_cn' => Yii::t('common', 'Name Zh Cn'),
            'name_en_gb' => Yii::t('common', 'Name En Gb'),
            'name_es_es' => Yii::t('common', 'Name Es Es'),
            'name_fr_fr' => Yii::t('common', 'Name Fr Fr'),
            'name_ru_ru' => Yii::t('common', 'Name Ru Ru'),
            'refmask_chrclasses' => Yii::t('common', 'Refmask Chrclasses'),
            'tab_number' => Yii::t('common', 'Tab Number'),
        ];
    }

    public function getRelationTree() {
        return $this->hasMany(ArmoryTalents::className(), ['TalentTab' => 'id']);
    }

}