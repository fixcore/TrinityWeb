<?php

namespace common\models\armory;

use Yii;

/**
 * This is the model class for table "dbc_spellicon".
 *
 * @property integer $Id
 * @property string $Name
 */
class ArmorySpellIcon extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'armory_spell_icon';
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
            [['Id', 'Name'], 'required'],
            [['Id'], 'integer'],
            [['Name'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => Yii::t('common', 'ID'),
            'Name' => Yii::t('common', 'Name'),
        ];
    }
}