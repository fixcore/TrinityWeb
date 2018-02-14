<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use trntv\filekit\widget\Upload;
use common\modules\forum\models\db\IconsActiveRecord;

/* @var $this yii\web\View */
/* @var $model app\models\Characters */
/* @var $form yii\widgets\ActiveForm */
?>

<script type="text/javascript">
    function show_input(element) {
        if($(element).val() == <?=IconsActiveRecord::TYPE_FONT?>) {
            $('#icon_input_string').show();
            $('#picture_input').hide();
        } else {
            $('#icon_input_string').hide();
            $('#picture_input').show();
        }
    }
</script>

<div class="icons-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'icon_type')->dropDownList(IconsActiveRecord::getTypes(), [
        'onchange' => 'show_input(this);',
    ]) ?>
    <div id="icon_input_string" style="<?=($model->icon_type != IconsActiveRecord::TYPE_FONT ? 'display:none;': '')?>">
        <pre>
    https://fontawesome.com/icons
    https://getbootstrap.com/docs/3.3/components/#glyphicons</pre>
        <?= $form->field($model, 'icon_string')->textInput(['maxlength' => true, 'id' => 'icon_string']) ?>
    </div>
    <div id="picture_input" style="<?=($model->icon_type != IconsActiveRecord::TYPE_IMAGE ? 'display:none;': '')?>">
        <?php echo $form->field($model, 'picture')->widget(
            Upload::className(),
            [
                'url' => ['/file-storage/upload'],
                'maxFileSize' => 5000000, // 5 MiB
            ]);
        ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('common', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
