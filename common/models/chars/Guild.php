<?php

namespace common\models\chars;

use Yii;

use common\core\models\characters\CoreModel;

/**
 * This is the model class for table "guild".
 *
 * @property integer $guildid
 * @property string $name
 * @property integer $leaderguid
 * @property integer $EmblemStyle
 * @property integer $EmblemColor
 * @property integer $BorderStyle
 * @property integer $BorderColor
 * @property integer $BackgroundColor
 * @property string $info
 * @property string $motd
 * @property integer $createdate
 * @property string $BankMoney
 */
class Guild extends CoreModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'guild';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guildid'], 'required'],
            [['guildid', 'leaderguid', 'EmblemStyle', 'EmblemColor', 'BorderStyle', 'BorderColor', 'BackgroundColor', 'createdate', 'BankMoney'], 'integer'],
            [['name'], 'string', 'max' => 24],
            [['info'], 'string', 'max' => 500],
            [['motd'], 'string', 'max' => 128],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'guildid' => Yii::t('app', 'Guildid'),
            'name' => Yii::t('app', 'Name'),
            'leaderguid' => Yii::t('app', 'Leaderguid'),
            'EmblemStyle' => Yii::t('app', 'Emblem Style'),
            'EmblemColor' => Yii::t('app', 'Emblem Color'),
            'BorderStyle' => Yii::t('app', 'Border Style'),
            'BorderColor' => Yii::t('app', 'Border Color'),
            'BackgroundColor' => Yii::t('app', 'Background Color'),
            'info' => Yii::t('app', 'Info'),
            'motd' => Yii::t('app', 'Motd'),
            'createdate' => Yii::t('app', 'Createdate'),
            'BankMoney' => Yii::t('app', 'Bank Money'),
        ];
    }
}
