<?php

use yii\helpers\Html;


/* @var $this yii\web\View */

$this->title = Yii::t('common', 'Добавление иконки');
Yii::$app->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Иконки'), 'url' => ['icons']];
Yii::$app->params['breadcrumbs'][] = $this->title;
?>
<div class="icons-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('icon_form', [
        'model' => $model,
    ]) ?>

</div>
