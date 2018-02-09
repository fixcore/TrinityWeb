<?php
/* @var $this yii\web\View */
$this->title = \Yii::$app->name;
?>
<div id="news-list">
    <?php echo \yii\widgets\ListView::widget([
        'dataProvider'=>$dataProvider,
        'pager'=>[
            'hideOnSinglePage'=>true,
        ],
        'itemView'=>'_item',
        'layout' => "{items}\n{pager}",
    ])?>
</div>