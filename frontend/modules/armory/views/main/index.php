<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\data\Pagination;
use yii\widgets\LinkPager;
use yii\bootstrap\ActiveForm;

use frontend\modules\armory\models\SearchForm;

if($counter) {
    $pages = new Pagination(['totalCount' => $counter, 'defaultPageSize' => SearchForm::PAGE_SIZE]);
}

?>
<?php $form = ActiveForm::begin([
        'id' => 'armory-form',
        'method' => 'get',
        'action' => ['/armory']
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
                <div class="col-md-7">
                    <?php echo $form->field($searchModel, 'query')->label(false) ?>
                </div>
                <div class="col-md-1">
                    <div class="form-group text-center-sm text-center-xs">
                        <?php echo Html::submitButton(Yii::t('common', 'Поиск'), ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if($searchResult) {
        foreach($searchResult as $character) {
    ?>
        <div class="row">
            <div class="col-xs-push-3 col-xs-6 col-sm-push-4 col-sm-4">
                <?=Yii::$app->AppHelper->buildTagRaceImage($character['race'],$character['gender'])?>
                <?=Yii::$app->AppHelper->buildTagClassImage($character['class'])?>
                <?php
                echo Html::a($character['name'], '/armory/character/' . Yii::$app->CharactersDbHelper->getServerName() . '/' . $character['name'], [
                    'target' => '_blank'
                ]);
                ?>
            </div>
        </div>
    <?php
        }
        echo LinkPager::widget([
            'pagination' => $pages,
        ]);
    }
    ?>
<?php ActiveForm::end(); ?>