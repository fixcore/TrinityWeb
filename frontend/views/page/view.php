<?php
/**
 * @var $this \yii\web\View
 * @var $model \common\models\Page
 */
$this->title = $model->title;
?>
<div class="flat">
    <div class="content page-item">
        <?php echo $model->body ?>
    </div>
</div>