<?php
use Yii;
?>
<div id="ladder-team-container">
    <div class="flat">
        <div class="ladder-team-header">
            <div class="col-xs-4">
                <?=Yii::t('ladder','Участник')?>
            </div>
            <div class="col-xs-3 hidden-xs text-center-xs">
                <?=Yii::t('ladder','Расса/Класс')?>
            </div>
            <div class="col-xs-2 text-center-xs">
                <?=Yii::t('ladder','Побед')?>
            </div>
            <div class="col-xs-3 text-center-xs">
                <?=Yii::t('ladder','Поражений')?>
            </div>
            <div class="col-xs-3 text-center-xs">
                <?=Yii::t('ladder','Рейтинг')?>
            </div>
            <div class="col-xs-3 hidden-xs text-center-xs">
                <?=Yii::t('ladder','ММР')?>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="ladder-team-members">
            <?php
            foreach($data['relationMembers'] as $item) {
            ?>
            <div class="ladder-team-member">
                <div class="col-xs-4">
                    {name}
                </div>
                <div class="col-xs-3 hidden-xs text-center-xs">
                    {character class info}
                </div>
                <div class="col-xs-2 text-center-xs">
                    {wins}
                </div>
                <div class="col-xs-3 text-center-xs">
                    {loses}
                </div>
                <div class="col-xs-3 text-center-xs">
                    {rating}
                </div>
                <div class="col-xs-3 hidden-xs text-center-xs">
                    {MMR}
                </div>
                <div class="clearfix"></div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
    --team info--
</div>