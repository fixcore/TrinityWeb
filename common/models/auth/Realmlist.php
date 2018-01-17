<?php

namespace common\models\auth;

use Yii;

/**
 * This is the model class for table "realmlist".
 *
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $localAddress
 * @property string $localSubnetMask
 * @property integer $port
 * @property integer $icon
 * @property integer $flag
 * @property integer $timezone
 * @property integer $allowedSecurityLevel
 * @property double $population
 * @property integer $gamebuild
 */
class Realmlist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'realmlist';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('auth');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['port', 'icon', 'flag', 'timezone', 'allowedSecurityLevel', 'gamebuild'], 'integer'],
            [['population'], 'number'],
            [['name'], 'string', 'max' => 32],
            [['address', 'localAddress', 'localSubnetMask'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'address' => Yii::t('app', 'Address'),
            'localAddress' => Yii::t('app', 'Local Address'),
            'localSubnetMask' => Yii::t('app', 'Local Subnet Mask'),
            'port' => Yii::t('app', 'Port'),
            'icon' => Yii::t('app', 'Icon'),
            'flag' => Yii::t('app', 'Flag'),
            'timezone' => Yii::t('app', 'Timezone'),
            'allowedSecurityLevel' => Yii::t('app', 'Allowed Security Level'),
            'population' => Yii::t('app', 'Population'),
            'gamebuild' => Yii::t('app', 'Gamebuild'),
        ];
    }
    
}
