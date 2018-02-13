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
                <div class="col-xs-push-2 col-xs-8 col-sm-push-2 col-sm-8 col-md-push-3 col-md-6 col-push-3 col-lg-6">
                    <div class="row">
                        <div class="col-md-4">
                            <?php echo $form->field($searchModel, 'server')->dropDownList($searchModel->getServers(),[
                                    'prompt' => Yii::t('cp','Выберите сервер'),
                                    'name' => 'server',
                                ])->label(false) ?>
                        </div>
                        <div class="col-md-2">
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