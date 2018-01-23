<?php

namespace common\models\auth;

use Yii;

/**
 * This is the model class for table "account".
 *
 * @property integer $id
 * @property string $username
 * @property string $sha_pass_hash
 * @property string $sessionkey
 * @property string $v
 * @property string $s
 * @property string $token_key
 * @property string $email
 * @property string $reg_mail
 * @property string $joindate
 * @property string $last_ip
 * @property string $last_attempt_ip
 * @property integer $failed_logins
 * @property integer $locked
 * @property string $lock_country
 * @property string $last_login
 * @property integer $online
 * @property integer $expansion
 * @property integer $mutetime
 * @property string $mutereason
 * @property string $muteby
 * @property integer $locale
 * @property string $os
 * @property integer $recruiter
 *
 * @property RbacAccountPermissions[] $rbacAccountPermissions
 */
class Accounts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'account';
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
            [['joindate', 'last_login'], 'safe'],
            [['failed_logins', 'locked', 'online', 'expansion', 'mutetime', 'locale', 'recruiter'], 'integer'],
            [['username'], 'string', 'max' => 32],
            [['sha_pass_hash'], 'string', 'max' => 40],
            [['sessionkey'], 'string', 'max' => 80],
            [['v', 's'], 'string', 'max' => 64],
            [['token_key'], 'string', 'max' => 100],
            [['email', 'reg_mail', 'mutereason'], 'string', 'max' => 255],
            [['last_ip', 'last_attempt_ip'], 'string', 'max' => 15],
            [['lock_country'], 'string', 'max' => 2],
            [['muteby'], 'string', 'max' => 50],
            [['os'], 'string', 'max' => 3],
            [['username'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Имя учётной записи'),
            'sha_pass_hash' => Yii::t('app', 'ХЭШ пароля'),
            'sessionkey' => Yii::t('app', 'ключ сессии'),
            'v' => Yii::t('app', 'V'),
            's' => Yii::t('app', 'S'),
            'token_key' => Yii::t('app', 'токен'),
            'email' => Yii::t('app', 'email'),
            'reg_mail' => Yii::t('app', 'registration email'),
            'joindate' => Yii::t('app', 'дата регистрации'),
            'last_ip' => Yii::t('app', 'последний ip'),
            'last_attempt_ip' => Yii::t('app', 'последний входной ip'),
            'failed_logins' => Yii::t('app', 'кол-во ошибок при авторизации'),
            'locked' => Yii::t('app', 'заблокирован'),
            'lock_country' => Yii::t('app', 'страна'),
            'last_login' => Yii::t('app', 'дата последнего входа'),
            'online' => Yii::t('app', 'Онлайн ?'),
            'expansion' => Yii::t('app', 'Аддон'),
            'mutetime' => Yii::t('app', 'Мут'),
            'mutereason' => Yii::t('app', 'Mutereason'),
            'muteby' => Yii::t('app', 'Молчание от'),
            'locale' => Yii::t('app', 'Язык'),
            'os' => Yii::t('app', 'ОС'),
            'recruiter' => Yii::t('app', 'От кого пришёл'),
        ];
    }
    
}
