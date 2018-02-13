<?php
use yii\bootstrap\Tabs;
use yii\bootstrap\Nav;

$this->registerJsFile('https://cdn.cavernoftime.com/api/tooltip.js');
?>

<div id="character_container">
    <div>
        <?php echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => [
            [
                'label' => Yii::t('armory','Персонаж'),
                'url' => [
                    'character/index',
                    'server' => Yii::$app->CharactersDbHelper->getServerName(),
                    'character' => $data['name']
                ],
                'active' => Yii::$app->controller->action->id == 'index' ? true : false,
            ],

            [
                'label' => Yii::t('armory','Таланты'),
                'url' => [
                    'character/talents',
                    'server' => Yii::$app->CharactersDbHelper->getServerName(),
                    'character' => $data['name']
                ],
                'active' => Yii::$app->controller->action->id == 'talents' ? true : false,
            ]
        ]
        ]);?>
        <div class="clearfix"></div>
    </div>
    <?php
    echo $this->render($view,[
        'data' => $data
    ]);
    ?>
</div>