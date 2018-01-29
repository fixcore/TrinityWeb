<?php

namespace common\models\armory;

use Yii;

/**
 * This is the model class for table "armory_icons".
 *
 * @property integer $displayid
 * @property string $icon
 */
class ArmoryIcons extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'armory_icons';
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
            [['displayid', 'icon'], 'required'],
            [['displayid'], 'integer'],
            [['icon'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'displayid' => Yii::t('common', 'Displayid'),
            'icon' => Yii::t('common', 'Icon'),
        ];
    }
}