<?php

namespace common\models\armory;

use Yii;

/**
 * This is the model class for table "armory_talents".
 *
 * @property integer $TalentID
 * @property integer $TalentTab
 * @property integer $Row
 * @property integer $Col
 * @property integer $Rank_1
 * @property integer $Rank_2
 * @property integer $Rank_3
 * @property integer $Rank_4
 * @property integer $Rank_5
 */
class ArmoryTalents extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'armory_talents';
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
            [['TalentID', 'TalentTab'], 'required'],
            [['TalentID', 'TalentTab', 'Row', 'Col', 'Rank_1', 'Rank_2', 'Rank_3', 'Rank_4', 'Rank_5'], 'integer'],
            [['TalentID'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'TalentID' => Yii::t('common', 'Talent ID'),
            'TalentTab' => Yii::t('common', 'Talent Tab'),
            'Row' => Yii::t('common', 'Row'),
            'Col' => Yii::t('common', 'Col'),
            'Rank_1' => Yii::t('common', 'Rank 1'),
            'Rank_2' => Yii::t('common', 'Rank 2'),
            'Rank_3' => Yii::t('common', 'Rank 3'),
            'Rank_4' => Yii::t('common', 'Rank 4'),
            'Rank_5' => Yii::t('common', 'Rank 5'),
        ];
    }

    public function getRelationSpell() {
        return $this->hasOne(ArmorySpell::className(),['id' => 'Rank_1']);
    }

}