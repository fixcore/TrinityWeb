<?php

namespace common\models\auth;

use Yii;

/**
 * This is the model class for table "{{%logs_ip_actions}}".
 *
 * @property integer $id
 * @property integer $account_id
 * @property integer $character_guid
 * @property integer $type
 * @property string $ip
 * @property string $systemnote
 * @property integer $unixtime
 * @property string $time
 * @property string $comment
 */
class LogsIpActions extends \yii\db\ActiveRecord
{
    public static $LOG_TYPES = [
        0 => 'Account Login',
        7 => 'Character Create',
        8 => 'Character Login',
        9 => 'Character Logout',
        10 => 'Character Delete',
        11 => 'Failed Character Delete',
    ];
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%logs_ip_actions}}';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('auth');
    }
    
    public function _types() {
        $data = [];
        foreach(self::$LOG_TYPES as $key => $type) {
            $data[$key] = Yii::t('common',$type);
        }
        return $data;
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['account_id', 'character_guid', 'type', 'unixtime'], 'required'],
            [['account_id', 'character_guid', 'type', 'unixtime'], 'integer'],
            [['systemnote', 'comment'], 'string'],
            [['time'], 'safe'],
            [['ip'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'account_id' => Yii::t('common', 'ID Уч. записи'),
            'character_guid' => Yii::t('common', 'ID Персонажа'),
            'type' => Yii::t('common', 'Тип'),
            'ip' => Yii::t('common', 'IP'),
            'systemnote' => Yii::t('common', 'Системное сообщение'),
            'unixtime' => Yii::t('common', 'Unixtime'),
            'time' => Yii::t('common', 'Время'),
            'comment' => Yii::t('common', 'Комментарий'),
        ];
    }
    
}
