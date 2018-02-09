<?php
/* @var $this \yii\web\View */
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\Nav;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

use common\widgets\Alert;

use frontend\modules\user\assets\UserAsset;

use frontend\modules\user\models\SelectCharacterForm;
use frontend\modules\user\models\SelectServerForm;

/* @var $content string */

UserAsset::register($this);

$this->beginContent('@frontend/views/layouts/base.php')
?>
    <div class="container push-header">
        
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
            <div class="col-xs-12 col-sm-5 col-md-3" id="user-panel-left-side">
                <?php $form = ActiveForm::begin([
                    'id' => 'server_select_form',
                    'action' => ['server/change']
                ]); ?>
                    <?php
                    $character_form = new SelectServerForm();
                    ?>
                    <?php echo $form->field($character_form, 'realm_id')->dropDownList(Yii::$app->CharactersDbHelper->getServers(true)) ?>
                    <div class="form-group">
                        <?php echo Html::submitButton(Yii::t('cp', 'Сменить игровой мир'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
                <?php $form = ActiveForm::begin([
                    'id' => 'character_select_form',
                    'action' => ['character/change']
                ]); ?>
                    <?php
                    $character_form = new SelectCharacterForm();
                    ?>
                    <?php echo $form->field($character_form, 'character_id')->dropDownList($character_form->characters(),[
                        'prompt' => Yii::t('cp','Персонаж не выбран'),
                    ]) ?>
                    <div class="form-group">
                        <?php echo Html::submitButton(Yii::t('cp', 'Выбрать персонажа'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
            <div class="col-xs-12 col-sm-7 col-md-9" id="user-panel-right-side">
                <?php
                Pjax::begin();
                    echo $content;
                Pjax::end();
                ?>
            </div>
        </div>
    </div>
<?php $this->endContent() ?>