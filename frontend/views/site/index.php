<?php
/* @var $this yii\web\View */
$this->title = Yii::$app->name;
?>
<?php echo \common\widgets\DbCarousel::widget([
    'key'=>'index',
    'options' => [
        'class' => 'slide carousel-with-indicator',
    ],
]) ?>