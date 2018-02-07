<?php
use yii\helpers\Url;
use yii\bootstrap\Tabs;
?>
<div id="armory_character_talents">
    <?php
    echo Tabs::widget([
        'items' => [
            [
                'label' => Yii::t('armory','Первый набор талантов'),
                'content' => $this->render('_talent_tree', ['group' => $data['talents'][0]]),
                'active' => true,
                'encode' => false,
            ],
            [
                'label' => Yii::t('armory','Второй набор талантов'),
                'content' => $this->render('_talent_tree',['group' => $data['talents'][1]]),
                'encode' => false,
            ]
        ]
    ]);
    ?>
</div>