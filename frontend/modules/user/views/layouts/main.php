<?php
/* @var $this \yii\web\View */
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\Nav;
use yii\widgets\Pjax;

use common\widgets\Alert;

use frontend\modules\user\assets\UserAsset;

/* @var $content string */

UserAsset::register($this);

$this->beginContent('@frontend/views/layouts/base.php')
?>
    <div class="container">
        
        <?php echo Breadcrumbs::widget([
            'links' => isset(Yii::$app->params['breadcrumbs']) ? Yii::$app->params['breadcrumbs'] : [],
        ]) ?>

        <?= Alert::widget() ?>
        
        <div id="user-panel-header">
            <?php echo Nav::widget([
                'options' => ['class' => 'navbar-nav', 'id' => 'menu-items'],
                'activateParents' => true,
                'items' => [
                    [
                        'label' => Yii::t('cp', 'Общая информация'),
                        'url' => ['/panel/main/index'],
                        'linkOptions' => [
                            'data-hover' => Yii::t('cp', 'Общая информация'),
                        ],
                    ],
                    [
                        'label' => Yii::t('cp', 'История уч. записи'),
                        'url' => ['/panel/logs/index'],
                        'linkOptions' => [
                            'data-hover' => Yii::t('cp', 'История уч. записи'),
                        ],
                    ],
                ]
            ]); ?>
            <div class="clearfix"></div>
        </div>
        <div class="row">
            <div class="col-xs-4" id="user-panel-left-side">
                &nbsp;
            </div>
            <div class="col-xs-8" id="user-panel-right-side">
                <?php
                Pjax::begin();
                
                    echo $content;
                    
                Pjax::end();
                ?>
            </div>
        </div>
    </div>
<?php $this->endContent() ?>