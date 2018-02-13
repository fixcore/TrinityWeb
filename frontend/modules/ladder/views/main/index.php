<?php
use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\data\Pagination;
use yii\widgets\LinkPager;
use yii\bootstrap\ActiveForm;

$pagination = new Pagination(['totalCount' => $data['totalCount']]);
$pagination->setPageSize($data['pageSize']);
?>
<div id="ladder-container">
    <div class="ladder-search">
        <?php $form = ActiveForm::begin([
            'id' => 'ladder-form',
            'method' => 'get',
            'action' => ['main/index'],
        ]); ?>
            <div class="row">
                <div class="col-xs-push-2 col-xs-8 col-sm-push-2 col-sm-8 col-md-push-1 col-md-8 col-lg-push-2 col-lg-6">
                    <div class="row">
                        <div class="col-md-8">
                            <?php echo $form->field($searchModel, 'server')->dropDownList($searchModel->getServers(),[
                                    'prompt' => Yii::t('cp','Выберите сервер'),
                                    'name' => 'server',
                                ])->label(false) ?>
                        </div>
                        <div class="col-md-3">
                            <?php echo $form->field($searchModel, 'type')->dropDownList($searchModel->_arr_types,[
                                    'prompt' => Yii::t('cp','Выберите тип'),
                                    'name' => 'type',
                                ])->label(false) ?>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group text-center-sm text-center-xs">
                                <?php echo Html::submitButton(Yii::t('common', 'Отобразить'), ['class' => 'btn btn-primary']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
    <?php
    if($data['list']) {
    ?>
    <div class="ladder-list flat">
        <div class="ladder-header">
            <div class="col-xs-1">
                <i class="fas fa-list-ol"></i>
            </div>
            <div class="col-xs-4 col-sm-5">
                <?=Yii::t('ladder','Название')?>
            </div>
            <div class="col-xs-3 col-sm-2 hidden-sm col-md-1 text-center-xs">
                <?=Yii::t('ladder','Игр')?>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-1 hidden-xs text-center-xs">
                <?=Yii::t('ladder','Побед')?>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 hidden-xs text-center-xs">
                <?=Yii::t('ladder','Поражений')?>
            </div>
            <div class="col-xs-3 col-sm-2 col-md-2 text-center-xs">
                <?=Yii::t('ladder','Рейтинг')?>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="ladder-list-items">
            <?php
            $_rank = $data['rank_start'];
            foreach($data['list'] as $item) {
            ?>
            <div class="ladder-list-item">
                <div class="col-xs-1">
                    <?=$_rank++?>
                </div>
                <div class="col-xs-4 col-sm-5">
                    <?=Html::a($item['name'],[
                        'team/index',
                        'teamId' => $item['arenaTeamId'],
                        'server' => Yii::$app->CharactersDbHelper->getServerNameById(Yii::$app->CharactersDbHelper->getServerFromGet()),
                    ])?>
                </div>
                <div class="col-xs-3 col-sm-2 hidden-sm col-md-1 text-center-xs">
                    <?=$item['seasonGames']?>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-1 hidden-xs text-center-xs">
                    <?=$item['seasonWins']?>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 hidden-xs text-center-xs">
                    <?=($item['seasonGames'] - $item['seasonWins'])?>
                </div>
                <div class="col-xs-3 col-sm-2 col-md-2 text-center-xs">
                    <?=$item['rating']?>
                </div>
                <div class="clearfix"></div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
    <?php
    } else {
        ?>
    <h3>
        <?=Yii::t('ladder','На данный момент список пуст.')?>
    </h3>
        <?php
    }
    ?>
</div>
<?=LinkPager::widget([
    'pagination' => $pagination,
]);?>