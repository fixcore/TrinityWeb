<?php

/**
 * Podium Module
 * Yii 2 Forum Module
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.1
 */

use kartik\tree\TreeView;
use common\modules\forum\models\Forum;

use common\modules\forum\models\db\IconsActiveRecord;

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('podium/view', 'List Forums');
Yii::$app->params['breadcrumbs'][] = ['label' => Yii::t('podium/view', 'Administration Dashboard'), 'url' => ['admin/index']];
Yii::$app->params['breadcrumbs'][] = ['label' => Yii::t('podium/view', 'Categories List'), 'url' => ['admin/categories']];
Yii::$app->params['breadcrumbs'][] = $this->title;

$this->registerJs("$('[data-toggle=\"popover\"]').popover();");

?>
<?= $this->render('/elements/admin/_navbar', ['active' => 'categories']); ?>
<br>
<div class="row">
    <div class="col-md-3 col-sm-4">
        <ul class="nav nav-pills nav-stacked">
            <li role="presentation"><a href="<?= Url::to(['admin/categories']) ?>"><span class="glyphicon glyphicon-list"></span> <?= Yii::t('podium/view', 'Categories List') ?></a></li>
<?php foreach ($categories as $category): ?>
            <li role="presentation"><a href="<?= Url::to(['admin/new-forum', 'cid' => $category->id]) ?>"><span class="glyphicon glyphicon-chevron-right"></span> <?= Html::encode($category->name) ?></a></li>
<?php endforeach; ?>
            <li role="presentation"><a href="<?= Url::to(['admin/new-category']) ?>"><span class="glyphicon glyphicon-plus"></span> <?= Yii::t('podium/view', 'Create new category') ?></a></li>
        </ul>
    </div>
    <div class="col-md-6 col-sm-8">
        <div class="panel panel-default">
            <div>
            <?php
            echo TreeView::widget([
                'query' => $query->addOrderBy('root, lft'), 
                'headingOptions' => ['label' => Yii::t('app','Список форумов')],
                'mainTemplate' => '<div>{wrapper}</div><div>{detail}</div>',
                'treeOptions' => [
                    'style' => 'height: 200px;',
                ],
                'iconEditSettings'=> [
                    'show' => 'list',
                    'type' => TreeView::ICON_RAW,
                    'listData' => IconsActiveRecord::getDataArray(),
                ],
                'fontAwesome' => true,
                'isAdmin' => true,
                'displayValue' => 1,
                'softDelete' => true,
                'cacheSettings' => [
                    'enableCache' => true
                ],
                'nodeAddlViews' => [
                    2 => '@common/modules/forum/views/admin/_forum_form',
                ],
                'nodeActions' => [
                    'manage' => Url::to(['/forum/forum-node/manage']),
                    'save' => Url::to(['/forum/forum-node/save']),
                ],
            ]);
            ?>
            </div>
        </div>
    </div>
</div>