<?php

namespace common\models;

use Yii;
use yii\base\Exception;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\web\IdentityInterface;

use common\commands\AddToTimelineCommand;

use common\models\auth\Accounts;

use common\models\chars\Characters;

use common\models\query\UserQuery;

use common\modules\forum\models\User as ForumUser;

/**
 * User model
 *
 * @property integer $id
 * @property integer $external_id
 * @property integer $realm_id
 * @property integer $character_id
 * @property string $username
 * @property string $password_hash
 * @property string $email
 * @property string $auth_key
 * @property string $access_token
 * @property string $oauth_client
 * @property string $oauth_client_user_id
 * @property string $publicIdentity
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $logged_at
 * @property string $password write-only password
 *
 * @property \common\models\UserProfile $userProfile
 * @property \common\models\auth\Accounts $relationGameAccount
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_NOT_ACTIVE = 1;
    const STATUS_ACTIVE = 2;
    const STATUS_DELETED = 3;

    const ROLE_USER = 'user';
    const ROLE_MODERATOR = 'moderator';
    const ROLE_ADMINISTRATOR = 'administrator';

    const EVENT_AFTER_SIGNUP = 'afterSignup';
    const EVENT_AFTER_LOGIN = 'afterLogin';
    
    /**
     * Expansion - WOTLK
     */
    const DEFAULT_EXPANSION = 2;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::find()
            ->active()
            ->andWhere(['id' => $id])
            ->one();
    }

    /**
     * @return UserQuery
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::find()
            ->active()
            ->andWhere(['access_token' => $token])
            ->one();
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return User|array|null
     */
    public static function findByUsername($username)
    {
        return static::find()
            ->active()
            ->andWhere(['username' => $username])
            ->one();
    }

    /**
     * Finds user by username or email
     *
     * @param string $login
     * @return User|array|null
     */
    public static function findByLogin($login)
    {
        return static::find()
            ->active()
            ->andWhere(['or', ['username' => $login], ['email' => $login]])
            ->one();
    }
    
    public function findUserCharacter() {
        $server = $this->realm_id;
        return Characters::find()->where(['guid' => $this->character_id])->one(Yii::$app->CharactersDbHelper->getConnection($server));
    }
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            'auth_key' => [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'auth_key'
                ],
                'value' => Yii::$app->getSecurity()->generateRandomString()
            ],
            'access_token' => [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'access_token'
                ],
                'value' => function () {
                    return Yii::$app->getSecurity()->generateRandomString(40);
                }
            ]
        ];
    }

    /**
     * @return array
     */
    public function scenarios()
    {
        return ArrayHelper::merge(
            parent::scenarios(),
            [
                'oauth_create' => [
                    'oauth_client', 'oauth_client_user_id', 'email', 'username', '!status'
                ]
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email'], 'unique'],
            ['status', 'default', 'value' => self::STATUS_NOT_ACTIVE],
            ['status', 'in', 'range' => array_keys(self::statuses())],
            [['username'], 'filter', 'filter' => '\yii\helpers\Html::encode'],
            [['realm_id','character_id','external_id'],'integer']
        ];
    }

    /**
     * Returns user statuses list
     * @return array|mixed
     */
    public static function statuses()
    {
        return [
            self::STATUS_NOT_ACTIVE => Yii::t('common', 'Not Active'),
            self::STATUS_ACTIVE => Yii::t('common', 'Active'),
            self::STATUS_DELETED => Yii::t('common', 'Deleted')
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('common', 'Username'),
            'email' => Yii::t('common', 'E-mail'),
            'status' => Yii::t('common', 'Status'),
            'access_token' => Yii::t('common', 'API access token'),
            'created_at' => Yii::t('common', 'Created at'),
            'updated_at' => Yii::t('common', 'Updated at'),
            'logged_at' => Yii::t('common', 'Last login'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserProfile()
    {
        return $this->hasOne(UserProfile::className(), ['user_id' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        $hash_password = self::generatePassword($this->username,$password);
        return $this->password_hash == $hash_password ? true : false;
    }
    
    public function generatePassword($username, $password) {
        return strtoupper(sha1(strtoupper($username).strtoupper(':'.$password.'')));
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = self::generatePassword($this->username, $password);
    }
    
    /**
     * Create Game Account
     *
     * @param true
     */
    public function createAccount() {
        $account = new Accounts();
        $account->username = $this->username;
        $account->email = $this->email;
        $account->expansion = self::DEFAULT_EXPANSION;
        $account->sha_pass_hash = $this->password_hash;
        $this->external_id = env('DEFAULT_ACCOUNT');
        if($account->save()) {
            $this->external_id = $account->id;
        } else {
            throw new Exception("Game account couldn't be created");
        }
        return $this;
    }
    
    public function checkIssetForumAccount() {
        if(!$this->relationForumAccount) {
            $newUser = new ForumUser();
            $newUser->setScenario('installation');
            $newUser->inherited_id = $this->id;
            $newUser->status = ForumUser::STATUS_ACTIVE;
            $newUser->role = ForumUser::ROLE_MEMBER;
            $newUser->username = $this->username;
            $newUser->save();
        }
    }
    
    public function getRelationForumAccount() {
        return $this->hasOne(ForumUser::className(),['inherited_id' => 'id']);
    }
    
    /**
     * Creates user profile and application event
     * @param array $profileData
     */
    public function afterSignup(array $profileData = [])
    {
        $this->refresh();
        Yii::$app->commandBus->handle(new AddToTimelineCommand([
            'category' => 'user',
            'event' => 'signup',
            'data' => [
                'public_identity' => $this->getPublicIdentity(),
                'user_id' => $this->getId(),
                'created_at' => $this->created_at
            ]
        ]));
        $profile = new UserProfile();
        $profile->locale = Yii::$app->language;
        $profile->load($profileData, '');
        $this->link('userProfile', $profile);
        $this->trigger(self::EVENT_AFTER_SIGNUP);
        // Default role
        $auth = Yii::$app->authManager;
        $auth->assign($auth->getRole(User::ROLE_USER), $this->getId());
        $this->checkIssetForumAccount();
    }
    
    /**
     * @return string
     */
    public function getPublicIdentity()
    {
        if ($this->userProfile && $this->userProfile->getFullname()) {
            return $this->userProfile->getFullname();
        }
        if ($this->username) {
            return $this->username;
        }
        return $this->email;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }
    
    public function getRelationGameAccount() {
        return $this->hasOne(Accounts::className(),['id' => 'external_id']);
    }
    /**
     * Проерка есть ли данный персонаж у пользователя (сервер выбраный пользователем)
     * @param string $name
     * @return bool true|false
     */
    public function HasCharacterByName($name) {
        $data = Characters::getList();
        foreach($data as $character) {
            if($character->name == $name) {
                return true;
            }
        }
        return false;
    }
    /**
     * Проерка есть ли данный персонаж у пользователя (сервер выбраный пользователем)
     * @param int $guid
     * @return bool true|false
     */
    public function HasCharacterByGuid($guid) {
        $data = Characters::getList();
        foreach($data as $character) {
            if($character->guid == $guid) {
                return true;
            }
        }
        return false;
    }
    
}
