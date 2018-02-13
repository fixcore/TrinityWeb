<?php
/* @var $this \yii\web\View */
use yii\helpers\ArrayHelper;
use common\modules\forum\assets\PodiumAsset;

PodiumAsset::register($this);

/* @var $content string */
$this->beginContent('@frontend/views/layouts/base.php')
?>
<div class="push-header">
    <div class="container" id="forum-container">
        <?= \common\widgets\Alert::widget()?>
        <?= $this->render('/elements/main/_breadcrumbs') ?>
        <div class="row">
            <div class="col-xs-12">
                <?php echo $content ?>
            </div>
        </div>
    </div>
</div>
<?php $this->endContent() ?>