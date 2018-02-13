<?php

use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use common\modules\forum\models\User;

$forumUser = User::findMe();
if($forumUser) {
    $messageCount = $forumUser->newMessagesCount;
} else {
    $messageCount = 0;
}

/* @var $this \yii\web\View */
/* @var $content string */

$this->beginContent('@frontend/views/layouts/_clear.php')
?>
<div class="wrap">
    <?php
    NavBar::begin([
        'id' => 'general-menu',
        'brandLabel' => '<span class="rf-studio-orange">RF</span><span class="rf-studio-white"> – studio</span>',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]); ?>
    <?php echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            [
                'label'=>Yii::t('frontend', 'Language'),
                'linkOptions' => [
                    'data-hover' => Yii::t('frontend', 'Language'),
                ],
                'items'=>array_map(function ($code) {
                    return [
                        'label' => Yii::$app->params['availableLocales'][$code],
                        'url' => ['/site/set-locale', 'locale'=>$code],
                        'active' => Yii::$app->language === $code
                    ];
                }, array_keys(Yii::$app->params['availableLocales']))
            ]
        ]
    ]); ?>
    <?php echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right', 'id' => 'menu-items'],
        'activateParents' => true,
        'items' => [
            [
                'label' => Yii::t('frontend', 'Home'),
                'url' => ['/site/index'],
                'linkOptions' => [
                    'data-hover' => Yii::t('frontend', 'Home'),
                ],
            ],
            [
                'label' => Yii::t('frontend', 'About'),
                'url' => ['/page/view', 'slug'=>'about'],
                'linkOptions' => [
                    'data-hover' => Yii::t('frontend', 'About'),
                ],
            ],
            [
                'label' => Yii::t('armory', 'Армори'),
                'url' => ['/armory/main/index'],
                'linkOptions' => [
                    'data-hover' => Yii::t('armory', 'Армори'),
                ],
            ],
            [
                'label' => Yii::t('ladder', 'Ладдер'),
                'url' => ['/ladder/main/index'],
                'linkOptions' => [
                    'data-hover' => Yii::t('ladder', 'Ладдер'),
                ],
            ],
            [
                'label' => Yii::t('podium/view', 'Форум'),
                'url' => ['/forum/forum/index'],
                'linkOptions' => [
                    'data-hover' => Yii::t('podium/view', 'Форум'),
                ],
            ],
            [
                'label' => Yii::t('frontend', 'Signup'),
                'url' => ['/panel/sign-in/signup'],
                'visible' => Yii::$app->user->isGuest,
                'linkOptions' => [
                    'data-hover' => Yii::t('frontend', 'Signup'),
                ],
            ],
            [
                'label' => Yii::t('frontend', 'Login'),
                'url' => ['/panel/sign-in/login'],
                'visible' => Yii::$app->user->isGuest,
                'linkOptions' => [
                    'data-hover' => Yii::t('frontend', 'Login'),
                ],
            ],
            [
                'label' => Yii::$app->user->isGuest ? '' : Yii::$app->user->identity->getPublicIdentity(),
                'visible' => !Yii::$app->user->isGuest,
                'linkOptions' => [
                    'class' => 'data-caret',
                ],
                'items'=>[
                    [
                        'label' => Yii::t('frontend', 'Личный кабинет'),
                        'url' => ['/panel/main/index']
                    ],
                    '<li class="divider"></li>',
                    [
                        'label' => Yii::t('frontend', 'Личный кабинет'),
                        'url' => ['/panel/settings/index']
                    ],
                    [
                        'label' => Yii::t('frontend', 'Настройки форума'),
                        'url' => ['/forum/profile']
                    ],
                    [
                        'label' => Yii::t('frontend', 'Backend'),
                        'url' => Yii::getAlias('@backendUrl'),
                        'visible'=> Yii::$app->user->can('moderator')
                    ],
                    [
                        'label' => Yii::t('frontend', 'Logout'),
                        'url' => ['/panel/sign-in/logout'],
                        'linkOptions' => ['data-method' => 'post']
                    ]
                ]
            ],
            [
                'label' => Yii::t('podium/view', 'Messages') . ($messageCount ? ' ' . Html::tag('span', $messageCount, ['class' => 'badge']) : '' ),
                'visible' => !Yii::$app->user->isGuest,
                'encode' => false,
                'linkOptions' => [
                    'class' => 'data-caret',
                ],
                'items'=>[
                    [
                        'label' => Yii::t('podium/view', 'Inbox') . ($messageCount ? ' ' . Html::tag('span', $messageCount, ['class' => 'badge']) : ''),
                        'url' => ['/forum/messages/inbox'],
                        'encode' => false,
                    ],
                    [
                        'label' => Yii::t('podium/view', 'Sent Messages'),
                        'url' => ['/forum/messages/sent']
                    ],
                    [
                        'label' => Yii::t('podium/view', 'New Message'),
                        'url' => ['/forum/messages/new']
                    ],
                ]
            ],
        ]
    ]); ?>
    <?php NavBar::end(); ?>

    <?php echo $content ?>

</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left rf-studio-aqua">
            &copy; RF-studio <?php echo date('Y') ?>
        </p>
    </div>
</footer>
<?php $this->endContent() ?>