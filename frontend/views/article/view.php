<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Article */
$this->title = $model->title;
Yii::$app->params['breadcrumbs'][] = $this->title;
?>
<div class="content">
    <article class="article-item flat">
        <h2 class="article-title">
            <?php echo $model->title ?>
        </h2>
        
        <?php if ($model->thumbnail_path): ?>
            <?php echo \yii\helpers\Html::img(
                Yii::$app->glide->createSignedUrl([
                    'glide/index',
                    'path' => $model->thumbnail_path,
                    'w' => 200
                ], true),
                ['class' => 'article-thumb img-rounded pull-left']
            ) ?>
        <?php endif; ?>
        <div class="article-meta">
            <span class="article-date">
                <?php echo Yii::$app->formatter->asDatetime($model->created_at) ?>
            </span>,
            <span class="article-category">
                <?php echo Html::a(
                    $model->category->title,
                    ['/category/' . $model->category_id]
                )?>
            </span>
        </div>
        <?php echo $model->body ?>

        <?php if (!empty($model->articleAttachments)): ?>
            <h3><?php echo Yii::t('frontend', 'Attachments') ?></h3>
            <ul id="article-attachments">
                <?php foreach ($model->articleAttachments as $attachment): ?>
                    <li>
                        <?php echo \yii\helpers\Html::a(
                            $attachment->name,
                            ['attachment-download', 'id' => $attachment->id])
                        ?>
                        (<?php echo Yii::$app->formatter->asSize($attachment->size) ?>)
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

    </article>
</div>