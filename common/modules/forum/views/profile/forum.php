<?php

/**
 * Podium Module
 * Yii 2 Forum Module
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.1
 */

use common\modules\forum\helpers\Helper;
use common\modules\forum\models\Meta;
use common\modules\forum\widgets\Avatar;
use common\modules\forum\widgets\editor\EditorBasic;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = Yii::t('podium/view', 'Forum Details');
Yii::$app->params['breadcrumbs'][] = ['label' => Yii::t('podium/view', 'My Profile'), 'url' => ['profile/index']];
Yii::$app->params['breadcrumbs'][] = $this->title;

$this->registerJs("$('[data-toggle=\"popover\"]').popover();");

?>
<div class="row">
    <div class="col-md-3 col-sm-4">
        <?= $this->render('/elements/profile/_navbar', ['active' => 'forum']) ?>
    </div>
    <div class="col-md-6 col-sm-8">
        <div class="panel panel-default">
            <?php $form = ActiveForm::begin(['id' => 'forum-form', 'options' => ['enctype' => 'multipart/form-data']]); ?>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'timezone')->widget(Select2::classname(), [
                                'data'          => Helper::timeZones(),
                                'theme'         => Select2::THEME_KRAJEE,
                                'showToggleAll' => false,
                                'options'       => ['placeholder' => Yii::t('podium/view', 'Select your time zone for proper dates display...')],
                                'pluginOptions' => ['allowClear' => true],
                            ])->label(Yii::t('podium/view', 'Time Zone'))
                            ->hint(Html::a(Yii::t('podium/view', 'What is my time zone?'), 'http://www.timezoneconverter.com/cgi-bin/findzone', ['target' => '_blank'])); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'anonymous')->checkbox(['uncheck' => 0])->label(Yii::t('podium/view', 'Hide username while forum viewing')) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'location')->textInput(['autocomplete' => 'off'])->label(Yii::t('podium/view', 'Whereabouts')) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form
                                ->field($model, 'signature')
                                ->label(Yii::t('podium/view', 'Signature under each post'))
                                ->widget(EditorBasic::className()) ?>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <?= Html::submitButton('<span class="glyphicon glyphicon-ok-sign"></span> ' . Yii::t('podium/view', 'Save changes'), ['class' => 'btn btn-block btn-primary', 'name' => 'save-button']) ?>
                        </div>
                    </div>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <div class="col-md-3 hidden-sm hidden-xs">
        <?= Avatar::widget([
            'author' => $user,
            'showName' => false
        ]) ?>
    </div>
</div><br>
