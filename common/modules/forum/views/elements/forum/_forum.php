<?php

/**
 * Podium Module
 * Yii 2 Forum Module
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.1
 */

use common\modules\forum\Podium;
use yii\helpers\Html;
use yii\helpers\Url;

?>
<td class="forum-icon">
    <a href="<?= Url::to(['forum/forum', 'cid' => $model->category_id, 'id' => $model->id, 'slug' => $model->slug]) ?>" class="rf-aqua center-block">
        <?= Html::encode($model->name) ?>
    </a>
    <?php if (!empty($model->sub)): ?>
        <small class="text-muted"><?= Html::encode($model->sub) ?></small>
    <?php endif; ?>
    <div class="row child-forums"><?php
        foreach($model->children()->all() as $child) {
            ?>
                <div class="col-xs-12 col-md-6 child-forum">
                    <a href="<?= Url::to(['forum/forum', 'cid' => $child->category_id, 'id' => $child->id, 'slug' => $child->slug]) ?>" class="center-block">
                        <?= Html::encode($child->name) ?>
                    </a>
                </div>
            <?php
        }
        ?>
    </div>
</td>
<td class="forum-icon text-right"><?= $model->threads ?></td>
<td class="forum-icon text-right"><?= $model->posts ?></td>
<td>
    <?php
    $latest = $model->findLatestPost();
    ?>
<?php if (!empty($latest) && !empty($latest->thread)): ?>
    <a href="<?= Url::to(['forum/thread', 'cid' => $latest->thread->category_id, 'fid' => $latest->thread->forum_id, 'id' => $latest->thread->id, 'slug' => $latest->thread->slug]) ?>" class="center-block rf-aqua"><?= Html::encode($latest->thread->name) ?></a>
    <small>
        <?= $latest->author->podiumTag ?>
        <span class="hidden-xs"><?= Podium::getInstance()->formatter->asDatetime($latest->created_at, 'medium') ?></span>
        <span class="hidden-sm hidden-md hidden-lg"><?= Podium::getInstance()->formatter->asDatetime($latest->created_at, 'short') ?></span>
    </small>
<?php endif; ?>
</td>
