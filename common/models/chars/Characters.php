<?php

namespace common\models\chars;

use Yii;
use yii\helpers\ArrayHelper;

use common\core\models\characters\CoreModel;

use common\models\armory\ArmoryTitles;
use common\models\armory\ArmoryTalentTab;
use common\models\armory\ArmoryRating;

/**
 * This is the model class for table "characters".
 *
 * @property integer $guid
 * @property integer $account
 * @property string $name
 * @property integer $race
 * @property integer $class
 * @property integer $gender
 * @property integer $level
 * @property integer $xp
 * @property integer $money
 * @property integer $skin
 * @property integer $face
 * @property integer $hairStyle
 * @property integer $hairColor
 * @property integer $facialStyle
 * @property integer $bankSlots
 * @property integer $restState
 * @property integer $playerFlags
 * @property double $position_x
 * @property double $position_y
 * @property double $position_z
 * @property integer $map
 * @property integer $instance_id
 * @property integer $instance_mode_mask
 * @property double $orientation
 * @property string $taximask
 * @property integer $online
 * @property integer $cinematic
 * @property integer $totaltime
 * @property integer $leveltime
 * @property integer $logout_time
 * @property integer $is_logout_resting
 * @property double $rest_bonus
 * @property integer $resettalents_cost
 * @property integer $resettalents_time
 * @property double $trans_x
 * @property double $trans_y
 * @property double $trans_z
 * @property double $trans_o
 * @property integer $transguid
 * @property integer $extra_flags
 * @property integer $stable_slots
 * @property integer $at_login
 * @property integer $zone
 * @property integer $death_expire_time
 * @property string $taxi_path
 * @property integer $arenaPoints
 * @property integer $totalHonorPoints
 * @property integer $todayHonorPoints
 * @property integer $yesterdayHonorPoints
 * @property integer $totalKills
 * @property integer $todayKills
 * @property integer $yesterdayKills
 * @property integer $chosenTitle
 * @property string $knownCurrencies
 * @property integer $watchedFaction
 * @property integer $drunk
 * @property integer $health
 * @property integer $power1
 * @property integer $power2
 * @property integer $power3
 * @property integer $power4
 * @property integer $power5
 * @property integer $power6
 * @property integer $power7
 * @property integer $latency
 * @property integer $talentGroupsCount
 * @property integer $activeTalentGroup
 * @property string $exploredZones
 * @property string $equipmentCache
 * @property integer $ammoId
 * @property string $knownTitles
 * @property integer $actionBars
 * @property integer $grantableLevels
 * @property integer $deleteInfos_Account
 * @property string $deleteInfos_Name
 * @property integer $deleteDate
 */
class Characters extends CoreModel
{

    const UPDATE_TIME = 120;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'characters';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guid', 'name', 'taximask'], 'required'],
            [['guid', 'account', 'race', 'class', 'gender', 'level', 'xp', 'money', 'skin', 'face', 'hairStyle', 'hairColor', 'facialStyle', 'bankSlots', 'restState', 'playerFlags', 'map', 'instance_id', 'instance_mode_mask', 'online', 'cinematic', 'totaltime', 'leveltime', 'logout_time', 'is_logout_resting', 'resettalents_cost', 'resettalents_time', 'transguid', 'extra_flags', 'stable_slots', 'at_login', 'zone', 'death_expire_time', 'arenaPoints', 'totalHonorPoints', 'todayHonorPoints', 'yesterdayHonorPoints', 'totalKills', 'todayKills', 'yesterdayKills', 'chosenTitle', 'knownCurrencies', 'watchedFaction', 'drunk', 'health', 'power1', 'power2', 'power3', 'power4', 'power5', 'power6', 'power7', 'latency', 'talentGroupsCount', 'activeTalentGroup', 'ammoId', 'actionBars', 'grantableLevels', 'deleteInfos_Account', 'deleteDate'], 'integer'],
            [['position_x', 'position_y', 'position_z', 'orientation', 'rest_bonus', 'trans_x', 'trans_y', 'trans_z', 'trans_o'], 'number'],
            [['taximask', 'taxi_path', 'exploredZones', 'equipmentCache', 'knownTitles'], 'string'],
            [['name', 'deleteInfos_Name'], 'string', 'max' => 12],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'guid' => Yii::t('app', 'Guid'),
            'account' => Yii::t('app', 'Account'),
            'name' => Yii::t('app', 'Name'),
            'race' => Yii::t('app', 'Race'),
            'class' => Yii::t('app', 'Class'),
            'gender' => Yii::t('app', 'Gender'),
            'level' => Yii::t('app', 'Level'),
            'xp' => Yii::t('app', 'Xp'),
            'money' => Yii::t('app', 'Money'),
            'skin' => Yii::t('app', 'Skin'),
            'face' => Yii::t('app', 'Face'),
            'hairStyle' => Yii::t('app', 'Hair Style'),
            'hairColor' => Yii::t('app', 'Hair Color'),
            'facialStyle' => Yii::t('app', 'Facial Style'),
            'bankSlots' => Yii::t('app', 'Bank Slots'),
            'restState' => Yii::t('app', 'Rest State'),
            'playerFlags' => Yii::t('app', 'Player Flags'),
            'position_x' => Yii::t('app', 'Position X'),
            'position_y' => Yii::t('app', 'Position Y'),
            'position_z' => Yii::t('app', 'Position Z'),
            'map' => Yii::t('app', 'Map'),
            'instance_id' => Yii::t('app', 'Instance ID'),
            'instance_mode_mask' => Yii::t('app', 'Instance Mode Mask'),
            'orientation' => Yii::t('app', 'Orientation'),
            'taximask' => Yii::t('app', 'Taximask'),
            'online' => Yii::t('app', 'Online'),
            'cinematic' => Yii::t('app', 'Cinematic'),
            'totaltime' => Yii::t('app', 'Totaltime'),
            'leveltime' => Yii::t('app', 'Leveltime'),
            'logout_time' => Yii::t('app', 'Logout Time'),
            'is_logout_resting' => Yii::t('app', 'Is Logout Resting'),
            'rest_bonus' => Yii::t('app', 'Rest Bonus'),
            'resettalents_cost' => Yii::t('app', 'Resettalents Cost'),
            'resettalents_time' => Yii::t('app', 'Resettalents Time'),
            'trans_x' => Yii::t('app', 'Trans X'),
            'trans_y' => Yii::t('app', 'Trans Y'),
            'trans_z' => Yii::t('app', 'Trans Z'),
            'trans_o' => Yii::t('app', 'Trans O'),
            'transguid' => Yii::t('app', 'Transguid'),
            'extra_flags' => Yii::t('app', 'Extra Flags'),
            'stable_slots' => Yii::t('app', 'Stable Slots'),
            'at_login' => Yii::t('app', 'At Login'),
            'zone' => Yii::t('app', 'Zone'),
            'death_expire_time' => Yii::t('app', 'Death Expire Time'),
            'taxi_path' => Yii::t('app', 'Taxi Path'),
            'arenaPoints' => Yii::t('app', 'Arena Points'),
            'totalHonorPoints' => Yii::t('app', 'Total Honor Points'),
            'todayHonorPoints' => Yii::t('app', 'Today Honor Points'),
            'yesterdayHonorPoints' => Yii::t('app', 'Yesterday Honor Points'),
            'totalKills' => Yii::t('app', 'Total Kills'),
            'todayKills' => Yii::t('app', 'Today Kills'),
            'yesterdayKills' => Yii::t('app', 'Yesterday Kills'),
            'chosenTitle' => Yii::t('app', 'Chosen Title'),
            'knownCurrencies' => Yii::t('app', 'Known Currencies'),
            'watchedFaction' => Yii::t('app', 'Watched Faction'),
            'drunk' => Yii::t('app', 'Drunk'),
            'health' => Yii::t('app', 'Health'),
            'power1' => Yii::t('app', 'Power1'),
            'power2' => Yii::t('app', 'Power2'),
            'power3' => Yii::t('app', 'Power3'),
            'power4' => Yii::t('app', 'Power4'),
            'power5' => Yii::t('app', 'Power5'),
            'power6' => Yii::t('app', 'Power6'),
            'power7' => Yii::t('app', 'Power7'),
            'latency' => Yii::t('app', 'Latency'),
            'talentGroupsCount' => Yii::t('app', 'Talent Groups Count'),
            'activeTalentGroup' => Yii::t('app', 'Active Talent Group'),
            'exploredZones' => Yii::t('app', 'Explored Zones'),
            'equipmentCache' => Yii::t('app', 'Equipment Cache'),
            'ammoId' => Yii::t('app', 'Ammo ID'),
            'knownTitles' => Yii::t('app', 'Known Titles'),
            'actionBars' => Yii::t('app', 'Action Bars'),
            'grantableLevels' => Yii::t('app', 'Grantable Levels'),
            'deleteInfos_Account' => Yii::t('app', 'Delete Infos  Account'),
            'deleteInfos_Name' => Yii::t('app', 'Delete Infos  Name'),
            'deleteDate' => Yii::t('app', 'Delete Date'),
        ];
    }
    /**
    * Поиск по имени персонажа
    * @param string $name Имя персонажа
    * @return \yii\db\ActiveRecord
    */
    public function findByName($name) {
        return Characters::find()->where(['name' => $name])->one();
    }
    /**
    * Связь для получения объекта содержащего данные о привязке к дому
    * @return \yii\db\ActiveQuery
    */
    public function getRelationHome() {
        return $this->HasOne(CharacterHomebind::className(), ['guid' => 'guid']);
    }
    /**
    * Связь для получения объекта содержащего данные о статистике арены
    * @return \yii\db\ActiveQuery
    */
    public function getRelationArenaStats() {
        return $this->hasOne(CharacterArenaStats::className(),['guid' => 'guid']);
    }
    /**
    * Связь для получения объекта содержащего данные о характеристиках персонажа
    * @return \yii\db\ActiveQuery
    */
    public function getRelationStats() {
        return $this->hasOne(CharacterStats::className(),['guid' => 'guid']);
    }
    /**
    * Связь для получения объекта содержащего данные о выбранном звании у персонажа
    * @return \yii\db\ActiveQuery
    */
    public function getRelationTitle() {
        return $this->hasOne(ArmoryTitles::className(),['id' => 'chosenTitle']);
    }
    /**
    * Связь для получения объекта содержащего данные о гильдии в торой состоит персонаж
    * @return \yii\db\ActiveQuery
    */
    public function getRelationGuild() {
        return $this->hasOne(GuildMember::className(),['guid' => 'guid']);
    }
    /**
    * Связь для получения объектов содержащих данные о друзьях персонажа и данные самих персонажей
    * @return \yii\db\ActiveQuery
    */
    public function getRelationSocialFriendsChars() {
        return $this->hasMany(CharacterSocial::className(),['guid' => 'guid'])->andWhere(['flags' => CharacterSocial::FRIENDS])->with('relationFriendCharacter');
    }
    /**
    * Связь для получения объектов содержащих данные о игнорируемых персонажах и данные самих персонажей
    * @return \yii\db\ActiveQuery
    */
    public function getRelationSocialBlockedChars() {
        return $this->hasMany(CharacterSocial::className(),['guid' => 'guid'])->andWhere(['flags' => CharacterSocial::BLOCKED])->with('relationFriendCharacter');
    }
    /**
    * Связь для получения объектов содержащих данные о статистике в команде и данные самой команды
    * @return \yii\db\ActiveQuery
    */
    public function getRelationArenaRating() {
        return $this->hasMany(ArenaTeamMember::className(),['guid' => 'guid'])->with(['teamRelation']);
    }
    /**
    * Связь для получения объектов содержащих данные о рейтингах для текущего уровня для персонажа
    * @return \yii\db\ActiveQuery
    */
    public function getRelationArmoryRating() {
        return $this->hasOne(ArmoryRating::className(),['level' => 'level']);
    }
    /**
    * Связь для получения объектов содержащих данные о первичных проффесиях у персонажа
    * @return \yii\db\ActiveQuery
    */
    public function getRelationGeneralProfessions() {
        return $this->hasMany(CharacterSkills::className(),['guid' => 'guid'])->andWhere([
            'skill' => Yii::$app->CoreHelper->_professions
        ])->with(['armoryProfession']);
    }
    /**
    * Функция проверки существования заклинания у персонажа
    * @param integer $spell_id ID Заклинания
    * @return bool
    */
    public function getRelationEquipment() {
        return $this->hasMany(CharacterInventory::className(),['guid' => 'guid'])
            ->andWhere(['slot' => Yii::$app->AppHelper::$ARRAY_SLOTS, 'bag' => 0])
            ->orderBy(['slot' => SORT_ASC])
            ->with('relationItemInstance');
            //->with('relationItemInstance.relationArmoryItem.relationIcon');
    }
    public function HasSpell($spell_id) {
        return CharacterSpell::find()->where(['guid' => $this->guid, 'spell' => $spell_id])->exists();
    }
    /**
    * Функция возврата персонажа домой
    * @return bool
    */
    public function goHome() {
        if($this->relationHome) {
            $this->position_x = $this->relationHome->posX;
            $this->position_y = $this->relationHome->posY;
            $this->position_z = $this->relationHome->posZ;
            $this->map = $this->relationHome->mapId;
            $this->zone = $this->relationHome->zoneId;
            $this->save();
            return true;
        }
        return false;
    }
    /**
    * Получает список персонажей для текущего пользователя
    * @return self | empty array
    */
    public function getList() {
        return self::find()->where(['account' => Yii::$app->user->identity->external_id])->all();
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    /*unknown*/
    public function clearOnlineCache($server_id) {
        $cache_key = 'server_' . $server_id . '_characters_online';
        Yii::$app->cache->delete($cache_key);
    }
    public function getOnlineByServer($server_id) {
        $cache_key = 'server_' . $server_id . '_characters_online';
        $characters_online_list = Yii::$app->cache->get($cache_key);
        if ($characters_online_list === false) {
            $characters_online_list = Characters::find()->where(['online' => 1])->asArray()->all(Characters::getDb($server_id));
            Yii::$app->cache->set($cache_key, $characters_online_list, self::UPDATE_TIME);
        }
        return $characters_online_list;
    }
    public function getSpecImageUrl($group = null,$spec = false) {
        if($spec !== false) return '/img/class/' . $this->class . '_' . $spec . '.png';
        return '/img/class/' . $this->class . '_' . ($this->getCharacterSpec($group)) . '.png';
    }
    public function getCharacterSpec($group = null) {
        if(!$group) $group = $this->activeTalentGroup;
        switch ($group) {
            case 0:
                return $this->specGroup1;
            case 1:
                return $this->specGroup2;
            default:
                return 0;
        }
    }
    public function getArenaRatingCache($server_id) {
        $cache_key = 'armory_character_arenas_' . $this->guid . '_' . $server_id;
        $output = Yii::$app->cache->get($cache_key);
        if ($output === false) {
            $output = ArenaTeamMember::find()->where(['guid' => $this->guid])->with('teamRelation')->asArray()->all();
            Yii::$app->cache->set($cache_key, $output, self::UPDATE_TIME);
        }
        return $output;
    }
    public function getLastAchievements($limit = 20, $server_id) {
        $cache_key = 'armory_character-achievements_' . $this->guid . '_' . $server_id;
        $output = Yii::$app->cache->get($cache_key);
        if($output === false) {
            $output = CharacterAchievement::find()->where(['guid' => $this->guid])->limit($limit)->orderBy(['date' => SORT_DESC])->with('achievementRelation')->asArray()->all();
            Yii::$app->cache->set($cache_key, $output, self::UPDATE_TIME * 5);
        }
        return $output;
    }
    public function findGuild($server_id) {
        $cache_key = 'armory_character-guild_' . $this->guid . '_' . $server_id;
        $output = Yii::$app->cache->get($cache_key);
        if($output === false) {
            if($this->relationGuild) {
                $output = $this->relationGuild->relationGuild->name;
            } else {
                $output = '- - - -';
            }
            Yii::$app->cache->set($cache_key, $output, self::UPDATE_TIME * 5);
        }
        return $output;
    }
    public function findProfessions($server_id) {
        $cache_key = 'armory_character-professions_' . $this->guid . '_' . $server_id;
        $output = Yii::$app->cache->get($cache_key);
        if ($output === false) {
            $professions = $this->generalProfessions;
            foreach($professions as $prof) {
                $output[] = [
                    'name' => $prof->armoryProfession->getName(),
                    'icon' => '/img/professions/' . $prof->armoryProfession->icon . '.jpg',
                ];
            }
            Yii::$app->cache->set($cache_key, $output, self::UPDATE_TIME);
        }
        return $output;
    }
    public function findItems($server_id) {
        $cache_key = 'armory_character-items_' . $this->guid . '_' . $server_id;
        $output = Yii::$app->cache->get($cache_key);
        if ($output === false) {
            $items = $this->equipmentRelation;
            foreach(Yii::$app->CoreHelper->avalible_slots as $slot) {
                //get current items in array
                $item = current($items);
                if($slot == $item->slot) {
                    $output[$slot] = [
                        'item_url' => Yii::$app->CoreHelper->buildUrl($item->itemInstanceRelation->itemEntry, Yii::$app->CoreHelper->type_item),
                        'icon_url' => Yii::$app->CoreHelper->buildItemIconUrl($slot, $item->itemInstanceRelation->armoryItem->iconRelation->icon),
                        'rel_item' => Yii::$app->CoreHelper->buildItemRel($item->itemInstanceRelation->itemEntry,explode(' ',$item->itemInstanceRelation->enchantments)),
                    ];
                } else {
                    $output[$slot] = [
                        'item_url' => '#self',
                        'icon_url' => Yii::$app->CoreHelper->buildItemIconUrl($slot),
                        'rel_item' => '',
                    ];
                }
                
                //move index to 1 up
                next($items);
            }
            Yii::$app->cache->set($cache_key, $output, self::UPDATE_TIME * 5);
        }
        return $output;
    }
    public function getGlyphs($group = 0, $server_id) {
        $cache_key = 'armory_character_glyphs_' . $this->guid . '_group_'.$group . '_serverId_' . $server_id;
        $result = Yii::$app->cache->get($cache_key);
        if($result === false) {
            $result = CharacterGlyphs::find()->where(['guid' => $this->guid, 'talentGroup' => $group])
                ->with(['glyph1.spellIcon','glyph2.spellIcon','glyph3.spellIcon','glyph4.spellIcon','glyph5.spellIcon','glyph6.spellIcon'])
                ->asArray()->one(Yii::$app->CoreHelper->getDB($server_id));
            Yii::$app->cache->set($cache_key,$result, self::UPDATE_TIME);
        }
        return $result;
    }
    public function getTalentsTree() {
        $cache_key = 'armory_talent_tree_' . $this->class . '_' . Yii::$app->language;
        $output = Yii::$app->cache->get($cache_key);
        if($output === false) {
            $data_tree = ArmoryTalentTab::find()
                ->where(['refmask_chrclasses' => Yii::$app->CoreHelper->getArmoryClassMask($this->class)])
                ->with(['tree.spell.icon'])
                ->asArray()
                ->all();
            foreach($data_tree as &$tree_tab) {
                //fix possible bugs -> set grouped by *Row*
                $tree_tab['tree'] = ArrayHelper::index($tree_tab['tree'], null, 'Row');
            }
            $output = $data_tree;
            Yii::$app->cache->set($cache_key,$output);
        }
        return $output;
    }
    public function checkTalentLearned($col,$group = 0, $server_id) {
        $cache_key = 'armory_talentLearned_' . $this->guid . '_col_' . $col['Col'] . '_' . $col['Row'] . '_' . $group . '_' . $server_id;
        $output = Yii::$app->cache->get($cache_key);
        if ($output === false) {
            $spells = CharacterTalent::find()->where([
                'guid' => $this->guid,
                'spell' => [
                  $col['Rank_5'],  
                  $col['Rank_4'],  
                  $col['Rank_3'],  
                  $col['Rank_2'],  
                  $col['Rank_1'],  
                ],
                'talentGroup' => $group
                ])->asArray()->all();
            if(!$spells) {
                $output = 0;
            } else {
                foreach($spells as $spell) {
                    if($col['Rank_5'] == $spell['spell']) {
                        $output = 5;
                    } elseif ($col['Rank_4'] == $spell['spell']) {
                        $output = 4;
                    } elseif ($col['Rank_3'] == $spell['spell']) {
                        $output = 3;
                    } elseif ($col['Rank_2'] == $spell['spell']) {
                        $output = 2;
                    } elseif ($col['Rank_1'] == $spell['spell']) {
                        $output = 1;
                    } else {
                        $output = 0;
                    }
                }
            }
            Yii::$app->cache->set($cache_key, $output, self::UPDATE_TIME);
        }
        return $output;
    }
    /*unknown*/
}