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
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
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
                        'url' => ['/panel/main/logs'],
                        'linkOptions' => [
                            'data-hover' => Yii::t('cp', 'История уч. записи'),
                        ],
                    ],
                ]
            ]); ?>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <?php
                Pjax::begin();
                
                    echo $content;
                    
                Pjax::end();
                ?>
            </div>
        </div>
    </div>
<?php $this->endContent() ?>