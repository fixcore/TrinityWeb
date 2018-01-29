<?php

namespace common\models\armory;

use Yii;

/**
 * This is the model class for table "armory_item_template".
 *
 * @property integer $entry
 * @property integer $class
 * @property integer $subclass
 * @property integer $SoundOverrideSubclass
 * @property string $name
 * @property integer $displayid
 * @property integer $Quality
 * @property integer $Flags
 * @property integer $FlagsExtra
 * @property integer $BuyCount
 * @property integer $BuyPrice
 * @property integer $SellPrice
 * @property integer $InventoryType
 * @property integer $AllowableClass
 * @property integer $AllowableRace
 * @property integer $ItemLevel
 * @property integer $RequiredLevel
 * @property integer $RequiredSkill
 * @property integer $RequiredSkillRank
 * @property integer $requiredspell
 * @property integer $requiredhonorrank
 * @property integer $RequiredCityRank
 * @property integer $RequiredReputationFaction
 * @property integer $RequiredReputationRank
 * @property integer $maxcount
 * @property integer $stackable
 * @property integer $ContainerSlots
 * @property integer $StatsCount
 * @property integer $stat_type1
 * @property integer $stat_value1
 * @property integer $stat_type2
 * @property integer $stat_value2
 * @property integer $stat_type3
 * @property integer $stat_value3
 * @property integer $stat_type4
 * @property integer $stat_value4
 * @property integer $stat_type5
 * @property integer $stat_value5
 * @property integer $stat_type6
 * @property integer $stat_value6
 * @property integer $stat_type7
 * @property integer $stat_value7
 * @property integer $stat_type8
 * @property integer $stat_value8
 * @property integer $stat_type9
 * @property integer $stat_value9
 * @property integer $stat_type10
 * @property integer $stat_value10
 * @property integer $ScalingStatDistribution
 * @property integer $ScalingStatValue
 * @property double $dmg_min1
 * @property double $dmg_max1
 * @property integer $dmg_type1
 * @property double $dmg_min2
 * @property double $dmg_max2
 * @property integer $dmg_type2
 * @property integer $armor
 * @property integer $holy_res
 * @property integer $fire_res
 * @property integer $nature_res
 * @property integer $frost_res
 * @property integer $shadow_res
 * @property integer $arcane_res
 * @property integer $delay
 * @property integer $ammo_type
 * @property double $RangedModRange
 * @property integer $spellid_1
 * @property integer $spelltrigger_1
 * @property integer $spellcharges_1
 * @property double $spellppmRate_1
 * @property integer $spellcooldown_1
 * @property integer $spellcategory_1
 * @property integer $spellcategorycooldown_1
 * @property integer $spellid_2
 * @property integer $spelltrigger_2
 * @property integer $spellcharges_2
 * @property double $spellppmRate_2
 * @property integer $spellcooldown_2
 * @property integer $spellcategory_2
 * @property integer $spellcategorycooldown_2
 * @property integer $spellid_3
 * @property integer $spelltrigger_3
 * @property integer $spellcharges_3
 * @property double $spellppmRate_3
 * @property integer $spellcooldown_3
 * @property integer $spellcategory_3
 * @property integer $spellcategorycooldown_3
 * @property integer $spellid_4
 * @property integer $spelltrigger_4
 * @property integer $spellcharges_4
 * @property double $spellppmRate_4
 * @property integer $spellcooldown_4
 * @property integer $spellcategory_4
 * @property integer $spellcategorycooldown_4
 * @property integer $spellid_5
 * @property integer $spelltrigger_5
 * @property integer $spellcharges_5
 * @property double $spellppmRate_5
 * @property integer $spellcooldown_5
 * @property integer $spellcategory_5
 * @property integer $spellcategorycooldown_5
 * @property integer $bonding
 * @property string $description
 * @property integer $PageText
 * @property integer $LanguageID
 * @property integer $PageMaterial
 * @property integer $startquest
 * @property integer $lockid
 * @property integer $Material
 * @property integer $sheath
 * @property integer $RandomProperty
 * @property integer $RandomSuffix
 * @property integer $block
 * @property integer $itemset
 * @property integer $MaxDurability
 * @property integer $area
 * @property integer $Map
 * @property integer $BagFamily
 * @property integer $TotemCategory
 * @property integer $socketColor_1
 * @property integer $socketContent_1
 * @property integer $socketColor_2
 * @property integer $socketContent_2
 * @property integer $socketColor_3
 * @property integer $socketContent_3
 * @property integer $socketBonus
 * @property integer $GemProperties
 * @property integer $RequiredDisenchantSkill
 * @property double $ArmorDamageModifier
 * @property integer $duration
 * @property integer $ItemLimitCategory
 * @property integer $HolidayId
 * @property string $ScriptName
 * @property integer $DisenchantID
 * @property integer $FoodType
 * @property integer $minMoneyLoot
 * @property integer $maxMoneyLoot
 * @property integer $flagsCustom
 * @property integer $VerifiedBuild
 */
class ArmoryItemTemplate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'armory_item_template';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('armory_db');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['entry'], 'required'],
            [['entry', 'class', 'subclass', 'SoundOverrideSubclass', 'displayid', 'Quality', 'Flags', 'FlagsExtra', 'BuyCount', 'BuyPrice', 'SellPrice', 'InventoryType', 'AllowableClass', 'AllowableRace', 'ItemLevel', 'RequiredLevel', 'RequiredSkill', 'RequiredSkillRank', 'requiredspell', 'requiredhonorrank', 'RequiredCityRank', 'RequiredReputationFaction', 'RequiredReputationRank', 'maxcount', 'stackable', 'ContainerSlots', 'StatsCount', 'stat_type1', 'stat_value1', 'stat_type2', 'stat_value2', 'stat_type3', 'stat_value3', 'stat_type4', 'stat_value4', 'stat_type5', 'stat_value5', 'stat_type6', 'stat_value6', 'stat_type7', 'stat_value7', 'stat_type8', 'stat_value8', 'stat_type9', 'stat_value9', 'stat_type10', 'stat_value10', 'ScalingStatDistribution', 'ScalingStatValue', 'dmg_type1', 'dmg_type2', 'armor', 'holy_res', 'fire_res', 'nature_res', 'frost_res', 'shadow_res', 'arcane_res', 'delay', 'ammo_type', 'spellid_1', 'spelltrigger_1', 'spellcharges_1', 'spellcooldown_1', 'spellcategory_1', 'spellcategorycooldown_1', 'spellid_2', 'spelltrigger_2', 'spellcharges_2', 'spellcooldown_2', 'spellcategory_2', 'spellcategorycooldown_2', 'spellid_3', 'spelltrigger_3', 'spellcharges_3', 'spellcooldown_3', 'spellcategory_3', 'spellcategorycooldown_3', 'spellid_4', 'spelltrigger_4', 'spellcharges_4', 'spellcooldown_4', 'spellcategory_4', 'spellcategorycooldown_4', 'spellid_5', 'spelltrigger_5', 'spellcharges_5', 'spellcooldown_5', 'spellcategory_5', 'spellcategorycooldown_5', 'bonding', 'PageText', 'LanguageID', 'PageMaterial', 'startquest', 'lockid', 'Material', 'sheath', 'RandomProperty', 'RandomSuffix', 'block', 'itemset', 'MaxDurability', 'area', 'Map', 'BagFamily', 'TotemCategory', 'socketColor_1', 'socketContent_1', 'socketColor_2', 'socketContent_2', 'socketColor_3', 'socketContent_3', 'socketBonus', 'GemProperties', 'RequiredDisenchantSkill', 'duration', 'ItemLimitCategory', 'HolidayId', 'DisenchantID', 'FoodType', 'minMoneyLoot', 'maxMoneyLoot', 'flagsCustom', 'VerifiedBuild'], 'integer'],
            [['dmg_min1', 'dmg_max1', 'dmg_min2', 'dmg_max2', 'RangedModRange', 'spellppmRate_1', 'spellppmRate_2', 'spellppmRate_3', 'spellppmRate_4', 'spellppmRate_5', 'ArmorDamageModifier'], 'number'],
            [['name', 'description'], 'string', 'max' => 255],
            [['ScriptName'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'entry' => Yii::t('common', 'Entry'),
            'class' => Yii::t('common', 'Class'),
            'subclass' => Yii::t('common', 'Subclass'),
            'SoundOverrideSubclass' => Yii::t('common', 'Sound Override Subclass'),
            'name' => Yii::t('common', 'Name'),
            'displayid' => Yii::t('common', 'Displayid'),
            'Quality' => Yii::t('common', 'Quality'),
            'Flags' => Yii::t('common', 'Flags'),
            'FlagsExtra' => Yii::t('common', 'Flags Extra'),
            'BuyCount' => Yii::t('common', 'Buy Count'),
            'BuyPrice' => Yii::t('common', 'Buy Price'),
            'SellPrice' => Yii::t('common', 'Sell Price'),
            'InventoryType' => Yii::t('common', 'Inventory Type'),
            'AllowableClass' => Yii::t('common', 'Allowable Class'),
            'AllowableRace' => Yii::t('common', 'Allowable Race'),
            'ItemLevel' => Yii::t('common', 'Item Level'),
            'RequiredLevel' => Yii::t('common', 'Required Level'),
            'RequiredSkill' => Yii::t('common', 'Required Skill'),
            'RequiredSkillRank' => Yii::t('common', 'Required Skill Rank'),
            'requiredspell' => Yii::t('common', 'Requiredspell'),
            'requiredhonorrank' => Yii::t('common', 'Requiredhonorrank'),
            'RequiredCityRank' => Yii::t('common', 'Required City Rank'),
            'RequiredReputationFaction' => Yii::t('common', 'Required Reputation Faction'),
            'RequiredReputationRank' => Yii::t('common', 'Required Reputation Rank'),
            'maxcount' => Yii::t('common', 'Maxcount'),
            'stackable' => Yii::t('common', 'Stackable'),
            'ContainerSlots' => Yii::t('common', 'Container Slots'),
            'StatsCount' => Yii::t('common', 'Stats Count'),
            'stat_type1' => Yii::t('common', 'Stat Type1'),
            'stat_value1' => Yii::t('common', 'Stat Value1'),
            'stat_type2' => Yii::t('common', 'Stat Type2'),
            'stat_value2' => Yii::t('common', 'Stat Value2'),
            'stat_type3' => Yii::t('common', 'Stat Type3'),
            'stat_value3' => Yii::t('common', 'Stat Value3'),
            'stat_type4' => Yii::t('common', 'Stat Type4'),
            'stat_value4' => Yii::t('common', 'Stat Value4'),
            'stat_type5' => Yii::t('common', 'Stat Type5'),
            'stat_value5' => Yii::t('common', 'Stat Value5'),
            'stat_type6' => Yii::t('common', 'Stat Type6'),
            'stat_value6' => Yii::t('common', 'Stat Value6'),
            'stat_type7' => Yii::t('common', 'Stat Type7'),
            'stat_value7' => Yii::t('common', 'Stat Value7'),
            'stat_type8' => Yii::t('common', 'Stat Type8'),
            'stat_value8' => Yii::t('common', 'Stat Value8'),
            'stat_type9' => Yii::t('common', 'Stat Type9'),
            'stat_value9' => Yii::t('common', 'Stat Value9'),
            'stat_type10' => Yii::t('common', 'Stat Type10'),
            'stat_value10' => Yii::t('common', 'Stat Value10'),
            'ScalingStatDistribution' => Yii::t('common', 'Scaling Stat Distribution'),
            'ScalingStatValue' => Yii::t('common', 'Scaling Stat Value'),
            'dmg_min1' => Yii::t('common', 'Dmg Min1'),
            'dmg_max1' => Yii::t('common', 'Dmg Max1'),
            'dmg_type1' => Yii::t('common', 'Dmg Type1'),
            'dmg_min2' => Yii::t('common', 'Dmg Min2'),
            'dmg_max2' => Yii::t('common', 'Dmg Max2'),
            'dmg_type2' => Yii::t('common', 'Dmg Type2'),
            'armor' => Yii::t('common', 'Armor'),
            'holy_res' => Yii::t('common', 'Holy Res'),
            'fire_res' => Yii::t('common', 'Fire Res'),
            'nature_res' => Yii::t('common', 'Nature Res'),
            'frost_res' => Yii::t('common', 'Frost Res'),
            'shadow_res' => Yii::t('common', 'Shadow Res'),
            'arcane_res' => Yii::t('common', 'Arcane Res'),
            'delay' => Yii::t('common', 'Delay'),
            'ammo_type' => Yii::t('common', 'Ammo Type'),
            'RangedModRange' => Yii::t('common', 'Ranged Mod Range'),
            'spellid_1' => Yii::t('common', 'Spellid 1'),
            'spelltrigger_1' => Yii::t('common', 'Spelltrigger 1'),
            'spellcharges_1' => Yii::t('common', 'Spellcharges 1'),
            'spellppmRate_1' => Yii::t('common', 'Spellppm Rate 1'),
            'spellcooldown_1' => Yii::t('common', 'Spellcooldown 1'),
            'spellcategory_1' => Yii::t('common', 'Spellcategory 1'),
            'spellcategorycooldown_1' => Yii::t('common', 'Spellcategorycooldown 1'),
            'spellid_2' => Yii::t('common', 'Spellid 2'),
            'spelltrigger_2' => Yii::t('common', 'Spelltrigger 2'),
            'spellcharges_2' => Yii::t('common', 'Spellcharges 2'),
            'spellppmRate_2' => Yii::t('common', 'Spellppm Rate 2'),
            'spellcooldown_2' => Yii::t('common', 'Spellcooldown 2'),
            'spellcategory_2' => Yii::t('common', 'Spellcategory 2'),
            'spellcategorycooldown_2' => Yii::t('common', 'Spellcategorycooldown 2'),
            'spellid_3' => Yii::t('common', 'Spellid 3'),
            'spelltrigger_3' => Yii::t('common', 'Spelltrigger 3'),
            'spellcharges_3' => Yii::t('common', 'Spellcharges 3'),
            'spellppmRate_3' => Yii::t('common', 'Spellppm Rate 3'),
            'spellcooldown_3' => Yii::t('common', 'Spellcooldown 3'),
            'spellcategory_3' => Yii::t('common', 'Spellcategory 3'),
            'spellcategorycooldown_3' => Yii::t('common', 'Spellcategorycooldown 3'),
            'spellid_4' => Yii::t('common', 'Spellid 4'),
            'spelltrigger_4' => Yii::t('common', 'Spelltrigger 4'),
            'spellcharges_4' => Yii::t('common', 'Spellcharges 4'),
            'spellppmRate_4' => Yii::t('common', 'Spellppm Rate 4'),
            'spellcooldown_4' => Yii::t('common', 'Spellcooldown 4'),
            'spellcategory_4' => Yii::t('common', 'Spellcategory 4'),
            'spellcategorycooldown_4' => Yii::t('common', 'Spellcategorycooldown 4'),
            'spellid_5' => Yii::t('common', 'Spellid 5'),
            'spelltrigger_5' => Yii::t('common', 'Spelltrigger 5'),
            'spellcharges_5' => Yii::t('common', 'Spellcharges 5'),
            'spellppmRate_5' => Yii::t('common', 'Spellppm Rate 5'),
            'spellcooldown_5' => Yii::t('common', 'Spellcooldown 5'),
            'spellcategory_5' => Yii::t('common', 'Spellcategory 5'),
            'spellcategorycooldown_5' => Yii::t('common', 'Spellcategorycooldown 5'),
            'bonding' => Yii::t('common', 'Bonding'),
            'description' => Yii::t('common', 'Description'),
            'PageText' => Yii::t('common', 'Page Text'),
            'LanguageID' => Yii::t('common', 'Language ID'),
            'PageMaterial' => Yii::t('common', 'Page Material'),
            'startquest' => Yii::t('common', 'Startquest'),
            'lockid' => Yii::t('common', 'Lockid'),
            'Material' => Yii::t('common', 'Material'),
            'sheath' => Yii::t('common', 'Sheath'),
            'RandomProperty' => Yii::t('common', 'Random Property'),
            'RandomSuffix' => Yii::t('common', 'Random Suffix'),
            'block' => Yii::t('common', 'Block'),
            'itemset' => Yii::t('common', 'Itemset'),
            'MaxDurability' => Yii::t('common', 'Max Durability'),
            'area' => Yii::t('common', 'Area'),
            'Map' => Yii::t('common', 'Map'),
            'BagFamily' => Yii::t('common', 'Bag Family'),
            'TotemCategory' => Yii::t('common', 'Totem Category'),
            'socketColor_1' => Yii::t('common', 'Socket Color 1'),
            'socketContent_1' => Yii::t('common', 'Socket Content 1'),
            'socketColor_2' => Yii::t('common', 'Socket Color 2'),
            'socketContent_2' => Yii::t('common', 'Socket Content 2'),
            'socketColor_3' => Yii::t('common', 'Socket Color 3'),
            'socketContent_3' => Yii::t('common', 'Socket Content 3'),
            'socketBonus' => Yii::t('common', 'Socket Bonus'),
            'GemProperties' => Yii::t('common', 'Gem Properties'),
            'RequiredDisenchantSkill' => Yii::t('common', 'Required Disenchant Skill'),
            'ArmorDamageModifier' => Yii::t('common', 'Armor Damage Modifier'),
            'duration' => Yii::t('common', 'Duration'),
            'ItemLimitCategory' => Yii::t('common', 'Item Limit Category'),
            'HolidayId' => Yii::t('common', 'Holiday ID'),
            'ScriptName' => Yii::t('common', 'Script Name'),
            'DisenchantID' => Yii::t('common', 'Disenchant ID'),
            'FoodType' => Yii::t('common', 'Food Type'),
            'minMoneyLoot' => Yii::t('common', 'Min Money Loot'),
            'maxMoneyLoot' => Yii::t('common', 'Max Money Loot'),
            'flagsCustom' => Yii::t('common', 'Flags Custom'),
            'VerifiedBuild' => Yii::t('common', 'Verified Build'),
        ];
    }
    
    public function getRelationIcon() {
        return $this->hasOne(ArmoryIcons::className(),['displayid' => 'displayid']);
    }
    
}