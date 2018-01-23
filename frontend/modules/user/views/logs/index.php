<?php

use common\grid\EnumColumn;
use common\models\ArticleCategory;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

?>
<div class="game-logs">
    <?= GridView::widget([
        'id' => 'game-logs-table',
        'dataProvider' => $game_logs_provider,
        'filterModel' => $game_logs_model,
        'tableOptions' => [
            'class' => 'table',
        ],
        'options' => [
            'class' => 'grid-view table-responsive'
        ],
        'pager' => [
            'maxButtonCount' => 4,
        ],
        'columns' => [
            [
                'label' => $game_logs_model->getAttributeLabel('ip'),
                'filter' => $game_logs_model->_types(),
                'filterInputOptions' => [
                    'class' => 'form-control',
                    'prompt' => Yii::t('cp','Выберите тип'),
                ],
                'attribute' => 'type',
                'value' => function($model) {
                    return $model->ip;
                },
            ],
            'time',
        ]
    ]); ?>
</div>