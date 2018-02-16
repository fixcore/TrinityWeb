<?php

/**
 * Podium Module
 * Yii 2 Forum Module
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.1
 */

use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="panel panel-default">
    <div class="panel-heading category_header" role="tab" id="category<?= $model->id ?>">
        <h4 class="panel-title">
            <a href="<?= Url::to(['forum/category', 'id' => $model->id, 'slug' => $model->slug]) ?>"><?= Html::encode($model->name) ?></a>
        </h4>
    </div>
    <div id="collapse<?= $model->id ?>" class="panel-collapse collapse in table-responsive" role="tabpanel" aria-labelledby="category<?= $model->id ?>">
        <?= $this->render('/elements/forum/_forums', ['category' => $model->id]) ?>
    </div>
</div>
