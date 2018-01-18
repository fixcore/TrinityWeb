<?php

namespace frontend\modules\user\models;

use Yii;
use yii\base\Model;
use yii\web\JsExpression;

use common\models\User;

/**
 * Account form
 */
class AccountForm extends Model
{
    /**
     * @var string
     */
    public $email;
    /**
     * @var string
     */
    public $password;
    /**
     * @var string
     */
    public $password_confirm;

    /**
     * @var User
     */
    private $user;

    /**
     * @param $user
     */
    public function setUser($user)
    {
        $this->user = $user;
        $this->email = $user->email;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique',
                'targetClass' => User::class,
                'message' => Yii::t('frontend', 'This email has already been taken.'),
                'filter' => function ($query) {
                    $query->andWhere(['not', ['id' => Yii::$app->user->getId()]]);
                }
            ],
            ['password', 'string'],
            [
                'password_confirm',
                'required',
                'when' => function ($model) {
                    return !empty($model->password);
                },
                'whenClient' => new JsExpression("function (attribute, value) {
                    return $('#accountform-password').val().length > 0;
                }")
            ],
            ['password_confirm', 'compare', 'compareAttribute' => 'password', 'skipOnEmpty' => false],

        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'email' => Yii::t('frontend', 'Email'),
            'password' => Yii::t('frontend', 'Password'),
            'password_confirm' => Yii::t('frontend', 'Confirm Password')
        ];
    }

    /**
     * @return bool
     */
    public function save()
    {
        $this->user->email = $this->email;
        if ($this->password) {
            $this->user->setPassword($this->password);
        }
        return $this->user->save();
    }
}
