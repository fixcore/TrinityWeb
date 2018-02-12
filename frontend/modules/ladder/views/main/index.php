<?php
use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\data\Pagination;
use yii\widgets\LinkPager;

$pagination = new Pagination(['totalCount' => $data['totalCount']]);
$pagination->setPageSize($data['pageSize']);
?>
<div id="ladder-container">
    <div class="row list-header">
        <div class="col-xs-12">
            <div class="flat">
                <div class="row no-gutters">
                    <div class="col-xs-6 col-md-8">
                        <?=Yii::t('ladder','Название')?>
                    </div>
                    <div class="col-xs-3 col-sm-2 col-md-1 text-center-xs">
                        <?=Yii::t('ladder','Игр')?>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-1 hidden-xs text-center-xs">
                        <?=Yii::t('ladder','Побед')?>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-1 hidden-xs text-center-xs">
                        <?=Yii::t('ladder','Поражений')?>
                    </div>
                    <div class="col-xs-3 col-sm-2 col-md-1 text-center-xs">
                        <?=Yii::t('ladder','Рейтинг')?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    foreach($data['list'] as $item) {
        ?>
        <div class="row list-item">
            <div class="col-xs-12">
                <div class="flat">
                    <div class="row no-gutters">
                        <div class="col-xs-6 col-md-8">
                            <?=$item['name']?>
                        </div>
                        <div class="col-xs-3 col-sm-2 col-md-1 text-center-xs">
                            <?=$item['seasonGames']?>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-1 hidden-xs text-center-xs">
                            <?=$item['seasonWins']?>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-1 hidden-xs text-center-xs">
                            <?=($item['seasonGames'] - $item['seasonWins'])?>
                        </div>
                        <div class="col-xs-3 col-sm-2 col-md-1 text-center-xs">
                            <?=$item['rating']?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>
<?=LinkPager::widget([
    'pagination' => $pagination,
]);?>