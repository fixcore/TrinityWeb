<?php
use yii\helpers\Url;
?>
<div id="armory_character">
    <div class="col-xs-12 col-md-7">
        <div class="row">
            <div class="col-xs-12 col-sm-11">
                <h4 id="armory_character_name" class="pull-left"><?=$data['name']?></h4>
                <span class="pull-left">
                    <div id="armory_character_title"><?=$data['title']?></div>
                    <div id="armory_character_guild"><?=$data['guild']?></div>
                </span>
                <div class="clearfix"></div>
            </div>
        </div>
        <div>
            <small>
                <?=Yii::t('armory','{level} уровень',[
                    'level' => $data['level'],
                ])?> <?=$data['race']?> <span class="cl-<?=$data['class_index']?>"><?=$data['class']?></span>
            </small>
        </div>
        <div class="row">
            <div class="col-xs-3 col-sm-1 col-md-2 col-lg-2">
                <div class="armory__character_item noselect character_item_head">
                    <?php
                    $item_info = $data['items'][Yii::$app->AppHelper::$INV_HEAD];
                    ?>
                    <a href="<?=$item_info['item_url']?>" rel="<?=$item_info['rel_item']?>" target="_blank">
                        <img src="<?=$item_info['icon_url']?>" class="armory-character-image" />
                    </a>
                </div>
                <div class="armory__character_item noselect character_item_neck">
                    <?php
                    $item_info = $data['items'][Yii::$app->AppHelper::$INV_NECK];
                    ?>
                    <a href="<?=$item_info['item_url']?>" rel="<?=$item_info['rel_item']?>" target="_blank">
                        <img src="<?=$item_info['icon_url']?>" class="armory-character-image" />
                    </a>
                </div>
                <div class="armory__character_item noselect character_item_shoulder">
                    <?php
                    $item_info = $data['items'][Yii::$app->AppHelper::$INV_SHOULDER];
                    ?>
                    <a href="<?=$item_info['item_url']?>" rel="<?=$item_info['rel_item']?>" target="_blank">
                        <img src="<?=$item_info['icon_url']?>" class="armory-character-image" />
                    </a>
                </div>
                <div class="armory__character_item noselect character_item_back">
                    <?php
                    $item_info = $data['items'][Yii::$app->AppHelper::$INV_BACK];
                    ?>
                    <a href="<?=$item_info['item_url']?>" rel="<?=$item_info['rel_item']?>" target="_blank">
                        <img src="<?=$item_info['icon_url']?>" class="armory-character-image" />
                    </a>
                </div>
                <div class="armory__character_item noselect character_item_chest">
                    <?php
                    $item_info = $data['items'][Yii::$app->AppHelper::$INV_CHEST];
                    ?>
                    <a href="<?=$item_info['item_url']?>" rel="<?=$item_info['rel_item']?>" target="_blank">
                        <img src="<?=$item_info['icon_url']?>" class="armory-character-image" />
                    </a>
                </div>
                <div class="armory__character_item noselect character_item_shirt">
                    <?php
                    $item_info = $data['items'][Yii::$app->AppHelper::$INV_SHIRT];
                    ?>
                    <a href="<?=$item_info['item_url']?>" rel="<?=$item_info['rel_item']?>" target="_blank">
                        <img src="<?=$item_info['icon_url']?>" class="armory-character-image" />
                    </a>
                </div>
                <div class="armory__character_item noselect character_item_tabard">
                    <?php
                    $item_info = $data['items'][Yii::$app->AppHelper::$INV_TABARD];
                    ?>
                    <a href="<?=$item_info['item_url']?>" rel="<?=$item_info['rel_item']?>" target="_blank">
                        <img src="<?=$item_info['icon_url']?>" class="armory-character-image" />
                    </a>
                </div>
                <div class="armory__character_item noselect character_item_wrist">
                    <?php
                    $item_info = $data['items'][Yii::$app->AppHelper::$INV_WRIST];
                    ?>
                    <a href="<?=$item_info['item_url']?>" rel="<?=$item_info['rel_item']?>" target="_blank">
                        <img src="<?=$item_info['icon_url']?>" class="armory-character-image" />
                    </a>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
                <div id="armory_character_stat_data">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <?=Yii::t('armory','Здоровье:')?>
                            <span class="character_health">
                                <?=number_format($data['stats']['maxhealth'], 0, '.', '.')?>
                            </span>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <?=Yii::$app->AppHelper->getCharacterPowerByClass($data['class_index'])?>: 
                            <span class="character_power">
                                {value}
                                <?php
                                //=number_format(Yii::$app->CoreHelper->getMaxPowerByClass($character), 0, '.', '')
                                ?>
                            </span>
                        </div>
                    </div>
                    <hr/>
                    <div id="armory_character_general_info">
                        <h4 class="rf-white"><?=Yii::t('armory','Характеристики')?></h4>
                        <div class="armory_character_stat">
                            <?=Yii::t('armory','Сила: {number}', [
                                'number' => number_format($data['stats']['strength'], 0, '.', '.'),
                            ])?>
                        </div>
                        <div class="armory_character_stat">
                            <?=Yii::t('armory','Ловкость: {number}', [
                                'number' => number_format($data['stats']['agility'], 0, '.', '.'),
                            ])?>
                        </div>
                        <div class="armory_character_stat">
                            <?=Yii::t('armory','Выносливость: {number}', [
                                'number' => number_format($data['stats']['stamina'], 0, '.', '.'),
                            ])?>
                        </div>
                        <div class="armory_character_stat">
                            <?=Yii::t('armory','Интеллект: {number}', [
                                'number' => number_format($data['stats']['intellect'], 0, '.', '.'),
                            ])?>
                        </div>
                        <div class="armory_character_stat">
                            <?=Yii::t('armory','Дух: {number}', [
                                'number' => number_format($data['stats']['spirit'], 0, '.', '.'),
                            ])?>
                        </div>
                        <div class="armory_character_stat">
                            <?=Yii::t('armory','Броня: {number}', [
                                'number' => number_format($data['stats']['armor'], 0, '.', '.'),
                            ])?>
                        </div>
                    </div>
                    <hr/>
                    <div id="amory_character_switch">
                        <ul id="armory_character_menu" class="nav nav-tabs">
                            <li class="active">
                                <a href="#melee" data-toggle="tab">
                                    <?=Yii::t('armory','Ближний бой')?>
                                </a>
                            </li>
                            <li>
                                <a href="#range" data-toggle="tab">
                                    <?=Yii::t('armory','Дальний бой')?>
                                </a>
                            </li>
                            <li>
                                <a href="#magic" data-toggle="tab">
                                    <?=Yii::t('armory','Магия')?>
                                </a>
                            </li>
                            <li>
                                <a href="#defence" data-toggle="tab">
                                    <?=Yii::t('armory','Защита')?>
                                </a>
                            </li>
                            <li class="previous-tab">
                                <a href="">
                                    <i class="fa rf-white fa-arrow-left"></i>
                                </a>
                            </li>
                            <li class="next-tab">
                                <a href="">
                                    <i class="fa rf-white fa-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="melee">
                                <div class="character_stat">
                                    <?=Yii::t('armory','Урон: {number}', [
                                        'number' => $data['stats']['melee_damage_from'] . ' - ' . $data['stats']['melee_damage_to'],
                                    ])?>
                                </div>
                                <div class="character_stat">
                                    <?=Yii::t('armory','Скорость атаки: {number}', [
                                        'number' => number_format($data['stats']['expertiseBaseAttackPct'], 0, '.', '.'),
                                    ])?>
                                </div>
                                <div class="character_stat">
                                    <?=Yii::t('armory','Сила атаки: {number}', [
                                        'number' => number_format($data['stats']['attackPower'], 0, '.', '.'),
                                    ])?>
                                </div>
                                <div class="character_stat">
                                    <?=Yii::t('armory','Меткость: {number}', [
                                        'number' => number_format($data['stats']['hitMelee'], 0, '.', '.'),
                                    ])?>
                                </div>
                                <div class="character_stat">
                                    <?=Yii::t('armory','Крит. удар: {number}%', [
                                        'number' => number_format($data['stats']['critPct'], 2, '.', '.'),
                                    ])?>
                                </div>
                                <div class="character_stat">
                                    <?=Yii::t('armory','Мастерство: {number}', [
                                        'number' => number_format($data['stats']['experience'], 0, '.', '.'),
                                    ])?>
                                </div>
                            </div>
                            <div class="tab-pane" id="range">
                                <div class="character_stat">
                                    <?=Yii::t('armory','Урон: {number}', [
                                        'number' => $data['stats']['range_damage_from'] . ' - ' . $data['stats']['range_damage_to'],
                                    ])?>
                                </div>
                                <div class="character_stat">
                                    <?=Yii::t('armory','Скорость атаки: {number}', [
                                        'number' => number_format($data['stats']['expertiseOffAttackPct'], 0, '.', '.'),
                                    ])?>
                                </div>
                                <div class="character_stat">
                                    <?=Yii::t('armory','Сила атаки: {number}', [
                                        'number' => number_format($data['stats']['rangedAttackPower'], 0, '.', '.'),
                                    ])?>
                                </div>
                                <div class="character_stat">
                                    <?=Yii::t('armory','Меткость: {number}', [
                                        'number' => number_format($data['stats']['hitRanged'], 0, '.', '.'),
                                    ])?>
                                </div>
                                <div class="character_stat">
                                    <?=Yii::t('armory','Крит. удар: {number}%', [
                                        'number' => number_format($data['stats']['rangedCritPct'], 2, '.', '.'),
                                    ])?>
                                </div>
                            </div>
                            <div class="tab-pane" id="magic">
                                <div class="character_stat">
                                    <?=Yii::t('armory','Сила заклинания: {number}', [
                                        'number' => number_format($data['stats']['spellPower'], 0, '.', '.'),
                                    ])?>
                                </div>
                                <div class="character_stat">
                                    <?=Yii::t('armory','Доп. лечение: {number}', [
                                        'number' => number_format($data['stats']['spellHealing'], 0, '.', '.'),
                                    ])?>
                                </div>
                                <div class="character_stat">
                                    <?=Yii::t('armory','Меткость: {number}', [
                                        'number' => number_format($data['stats']['hitSpell'], 0, '.', '.'),
                                    ])?>
                                </div>
                                <div class="character_stat">
                                    <?=Yii::t('armory','Крит. удар: {number}%', [
                                        'number' => number_format($data['stats']['spellCrit'], 2, '.', '.'),
                                    ])?>
                                </div>
                                <div class="character_stat">
                                    <?=Yii::t('armory','Скорость: {number}', [
                                        'number' => number_format($data['stats']['hasteSpell'], 0, '.', '.'),
                                    ])?>
                                </div>
                                <div class="character_stat">
                                    <?=Yii::t('armory','Вост. маны: {number}', [
                                        'number' => $data['stats']['mp5'],
                                    ])?>
                                </div>
                            </div>
                            <div class="tab-pane" id="defence">
                                <div class="character_stat">
                                    <?=Yii::t('armory','Защита: {number}', [
                                        'number' => number_format($data['stats']['defence'], 2, '.', '.'),
                                    ])?>
                                </div>
                                <div class="character_stat">
                                    <?=Yii::t('armory','Уклонение: {number}%', [
                                        'number' => number_format($data['stats']['dodgePct'], 2, '.', '.'),
                                    ])?>
                                </div>
                                <div class="character_stat">
                                    <?=Yii::t('armory','Парирование: {number}%', [
                                        'number' => number_format($data['stats']['parryPct'], 2, '.', '.'),
                                    ])?>
                                </div>
                                <div class="character_stat">
                                    <?=Yii::t('armory','Блок: {number}%', [
                                        'number' => number_format($data['stats']['blockPct'], 2, '.', '.'),
                                    ])?>
                                </div>
                                <div class="character_stat">
                                    <?=Yii::t('armory','Устойчивость: {number}', [
                                        'number' => number_format($data['stats']['resilience'], 0, '.', '.'),
                                    ])?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-3 col-sm-1 col-md-2 col-lg-2">
                <div class="armory__character_item noselect character_item_hands">
                    <?php
                    $item_info = $data['items'][Yii::$app->AppHelper::$INV_GLOVES];
                    ?>
                    <a href="<?=$item_info['item_url']?>" rel="<?=$item_info['rel_item']?>" target="_blank">
                        <img src="<?=$item_info['icon_url']?>" class="armory-character-image" />
                    </a>
                </div>
                <div class="armory__character_item noselect character_item_waist">
                    <?php
                    $item_info = $data['items'][Yii::$app->AppHelper::$INV_BELT];
                    ?>
                    <a href="<?=$item_info['item_url']?>" rel="<?=$item_info['rel_item']?>" target="_blank">
                        <img src="<?=$item_info['icon_url']?>" class="armory-character-image" />
                    </a>
                </div>
                <div class="armory__character_item noselect character_item_legs">
                    <?php
                    $item_info = $data['items'][Yii::$app->AppHelper::$INV_LEGS];
                    ?>
                    <a href="<?=$item_info['item_url']?>" rel="<?=$item_info['rel_item']?>" target="_blank">
                        <img src="<?=$item_info['icon_url']?>" class="armory-character-image" />
                    </a>
                </div>
                <div class="armory__character_item noselect character_item_feet">
                    <?php
                    $item_info = $data['items'][Yii::$app->AppHelper::$INV_BOOTS];
                    ?>
                    <a href="<?=$item_info['item_url']?>" rel="<?=$item_info['rel_item']?>" target="_blank">
                        <img src="<?=$item_info['icon_url']?>" class="armory-character-image" />
                    </a>
                </div>
                <div class="armory__character_item noselect character_item_ring_1">
                    <?php
                    $item_info = $data['items'][Yii::$app->AppHelper::$INV_RING_1];
                    ?>
                    <a href="<?=$item_info['item_url']?>" rel="<?=$item_info['rel_item']?>" target="_blank">
                        <img src="<?=$item_info['icon_url']?>" class="armory-character-image" />
                    </a>
                </div>
                <div class="armory__character_item noselect character_item_ring_2">
                    <?php
                    $item_info = $data['items'][Yii::$app->AppHelper::$INV_RING_2];
                    ?>
                    <a href="<?=$item_info['item_url']?>" rel="<?=$item_info['rel_item']?>" target="_blank">
                        <img src="<?=$item_info['icon_url']?>" class="armory-character-image" />
                    </a>
                </div>
                <div class="armory__character_item noselect character_item_trinket_1">
                    <?php
                    $item_info = $data['items'][Yii::$app->AppHelper::$INV_TRINKET_1];
                    ?>
                    <a href="<?=$item_info['item_url']?>" rel="<?=$item_info['rel_item']?>" target="_blank">
                        <img src="<?=$item_info['icon_url']?>" class="armory-character-image" />
                    </a>
                </div>
                <div class="armory__character_item noselect character_item_trinket_2">
                    <?php
                    $item_info = $data['items'][Yii::$app->AppHelper::$INV_TRINKET_2];
                    ?>
                    <a href="<?=$item_info['item_url']?>" rel="<?=$item_info['rel_item']?>" target="_blank">
                        <img src="<?=$item_info['icon_url']?>" class="armory-character-image" />
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-5">
        <div id="professions_info">
            <?php
            foreach($data['professions'] as $prof) {
                
            }
            ?>
        </div>
        <div id="achievements_info">
            <?php
            foreach($data['achievements'] as $achiv) {
                ?>
                <div class="achievement_data">
                    <a href="<?=Yii::$app->AppHelper->buildDBUrl($achiv['id'],Yii::$app->AppHelper::$TYPE_ACHIEVEMENT)?>" target="_blank">
                        <img width="15" alt="" />
                        <?=$achiv['name']?>
                    </a>
                    <?=date('Y-m-d H:i:s',$achiv['date'])?>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
