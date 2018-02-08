<?php
use Yii;
?>
<div class="row">
    <?php
    foreach($group as $tab_key => $tab) {
    ?>
    <div class="col-xs-12 col-md-4 talents_tab">
        <div class="talent_tab_header">
            <?=$tab['name']?> - <?=$tab['counter']?>
        </div>
        <?php
        foreach($tab['tree'] as $row) {
            ?>
            <div class="row">
                <div class="col-xs-push-1 col-xs-10">
                    <div class="row">
                        <div class="col-xs-3 text-center">
                            <?php
                            //col-1
                            if(isset($row[0])) {
                            ?>
                                <a href="<?=Yii::$app->AppHelper->buildDBUrl($row[0]['id_spell'], Yii::$app->AppHelper::$TYPE_SPELL)?>" target="_blank">
                                    <img src="<?=Yii::$app->AppHelper->buildSpellIconUrl($row[0]['icon_name'])?>" class="<?=$row[0]['count'] ? '' : 'image-grayscale'?>" alt=""/>
                                </a>
                                <div class="talents_counter">
                                    <?=$row[0]['count'] . '/' . $row[0]['max']?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="col-xs-3 text-center">
                            <?php
                            //col-2
                            if(isset($row[1])) {
                            ?>
                                <a href="<?=Yii::$app->AppHelper->buildDBUrl($row[1]['id_spell'], Yii::$app->AppHelper::$TYPE_SPELL)?>" target="_blank">
                                    <img src="<?=Yii::$app->AppHelper->buildSpellIconUrl($row[1]['icon_name'])?>" class="<?=$row[1]['count'] ? '' : 'image-grayscale'?>" alt=""/>
                                </a>
                                <div class="talents_counter">
                                    <?=$row[1]['count'] . '/' . $row[1]['max']?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="col-xs-3 text-center">
                            <?php
                            //col-3
                            if(isset($row[2])) {
                            ?>
                                <a href="<?=Yii::$app->AppHelper->buildDBUrl($row[2]['id_spell'], Yii::$app->AppHelper::$TYPE_SPELL)?>" target="_blank">
                                    <img src="<?=Yii::$app->AppHelper->buildSpellIconUrl($row[2]['icon_name'])?>" class="<?=$row[2]['count'] ? '' : 'image-grayscale'?>" alt=""/>
                                </a>
                                <div class="talents_counter">
                                    <?=$row[2]['count'] . '/' . $row[2]['max']?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="col-xs-3 text-center">
                            <?php
                            //col-4
                            if(isset($row[3])) {
                            ?>
                                <a href="<?=Yii::$app->AppHelper->buildDBUrl($row[3]['id_spell'], Yii::$app->AppHelper::$TYPE_SPELL)?>" target="_blank">
                                    <img src="<?=Yii::$app->AppHelper->buildSpellIconUrl($row[3]['icon_name'])?>" class="<?=$row[3]['count'] ? '' : 'image-grayscale'?>" alt=""/>
                                </a>
                                <div class="talents_counter">
                                    <?=$row[3]['count'] . '/' . $row[3]['max']?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        <?php
        if($tab_key != count($group) - 1) {
            echo "<hr/>";
        }
        ?>
    </div>
    <?php
    }
    ?>
</div>