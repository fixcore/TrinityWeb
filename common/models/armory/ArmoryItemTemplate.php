<?php

namespace common\models\armory;

use Yii;

/**
 * This is the model class for table "{{%armory_item_template}}".
 *
 * @property int $entry
 * @property int $class
 * @property int $subclass
 * @property int $unk0
 * @property string $name
 * @property int $displayid
 * @property int $Quality
 * @property int $Flags
 * @property int $Flags2
 * @property int $BuyCount
 * @property int $BuyPrice
 * @property int $SellPrice
 * @property int $InventoryType
 * @property int $AllowableClass
 * @property int $AllowableRace
 * @property int $ItemLevel
 * @property int $RequiredLevel
 * @property int $RequiredSkill
 * @property int $RequiredSkillRank
 * @property int $requiredspell
 * @property int $requiredhonorrank
 * @property int $RequiredCityRank
 * @property int $RequiredReputationFaction
 * @property int $RequiredReputationRank
 * @property int $maxcount
 * @property int $stackable
 * @property int $ContainerSlots
 * @property int $StatsCount
 * @property int $stat_type1
 * @property int $stat_value1
 * @property int $stat_type2
 * @property int $stat_value2
 * @property int $stat_type3
 * @property int $stat_value3
 * @property int $stat_type4
 * @property int $stat_value4
 * @property int $stat_type5
 * @property int $stat_value5
 * @property int $stat_type6
 * @property int $stat_value6
 * @property int $stat_type7
 * @property int $stat_value7
 * @property int $stat_type8
 * @property int $stat_value8
 * @property int $stat_type9
 * @property int $stat_value9
 * @property int $stat_type10
 * @property int $stat_value10
 * @property int $ScalingStatDistribution
 * @property int $ScalingStatValue
 * @property double $dmg_min1
 * @property double $dmg_max1
 * @property int $dmg_type1
 * @property double $dmg_min2
 * @property double $dmg_max2
 * @property int $dmg_type2
 * @property int $armor
 * @property int $holy_res
 * @property int $fire_res
 * @property int $nature_res
 * @property int $frost_res
 * @property int $shadow_res
 * @property int $arcane_res
 * @property int $delay
 * @property int $ammo_type
 * @property double $RangedModRange
 * @property int $spellid_1
 * @property int $spelltrigger_1
 * @property int $spellcharges_1
 * @property double $spellppmRate_1
 * @property int $spellcooldown_1
 * @property int $spellcategory_1
 * @property int $spellcategorycooldown_1
 * @property int $spellid_2
 * @property int $spelltrigger_2
 * @property int $spellcharges_2
 * @property double $spellppmRate_2
 * @property int $spellcooldown_2
 * @property int $spellcategory_2
 * @property int $spellcategorycooldown_2
 * @property int $spellid_3
 * @property int $spelltrigger_3
 * @property int $spellcharges_3
 * @property double $spellppmRate_3
 * @property int $spellcooldown_3
 * @property int $spellcategory_3
 * @property int $spellcategorycooldown_3
 * @property int $spellid_4
 * @property int $spelltrigger_4
 * @property int $spellcharges_4
 * @property double $spellppmRate_4
 * @property int $spellcooldown_4
 * @property int $spellcategory_4
 * @property int $spellcategorycooldown_4
 * @property int $spellid_5
 * @property int $spelltrigger_5
 * @property int $spellcharges_5
 * @property double $spellppmRate_5
 * @property int $spellcooldown_5
 * @property int $spellcategory_5
 * @property int $spellcategorycooldown_5
 * @property int $bonding
 * @property string $description
 * @property int $PageText
 * @property int $LanguageID
 * @property int $PageMaterial
 * @property int $startquest
 * @property int $lockid
 * @property int $Material
 * @property int $sheath
 * @property int $RandomProperty
 * @property int $RandomSuffix
 * @property int $block
 * @property int $itemset
 * @property int $MaxDurability
 * @property int $area
 * @property int $Map
 * @property int $BagFamily
 * @property int $TotemCategory
 * @property int $socketColor_1
 * @property int $socketContent_1
 * @property int $socketColor_2
 * @property int $socketContent_2
 * @property int $socketColor_3
 * @property int $socketContent_3
 * @property int $socketBonus
 * @property int $GemProperties
 * @property int $RequiredDisenchantSkill
 * @property double $ArmorDamageModifier
 * @property int $Duration
 * @property int $ItemLimitCategory
 * @property int $HolidayId
 * @property string $ScriptName
 * @property int $DisenchantID
 * @property int $FoodType
 * @property int $minMoneyLoot
 * @property int $maxMoneyLoot
 * @property int $ExtraFlags
 */
class ArmoryItemTemplate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%armory_item_template}}';
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
            [['entry', 'class', 'subclass', 'unk0', 'displayid', 'Quality', 'Flags', 'Flags2', 'BuyCount', 'BuyPrice', 'SellPrice', 'InventoryType', 'AllowableClass', 'AllowableRace', 'ItemLevel', 'RequiredLevel', 'RequiredSkill', 'RequiredSkillRank', 'requiredspell', 'requiredhonorrank', 'RequiredCityRank', 'RequiredReputationFaction', 'RequiredReputationRank', 'maxcount', 'stackable', 'ContainerSlots', 'StatsCount', 'stat_type1', 'stat_value1', 'stat_type2', 'stat_value2', 'stat_type3', 'stat_value3', 'stat_type4', 'stat_value4', 'stat_type5', 'stat_value5', 'stat_type6', 'stat_value6', 'stat_type7', 'stat_value7', 'stat_type8', 'stat_value8', 'stat_type9', 'stat_value9', 'stat_type10', 'stat_value10', 'ScalingStatDistribution', 'ScalingStatValue', 'dmg_type1', 'dmg_type2', 'armor', 'holy_res', 'fire_res', 'nature_res', 'frost_res', 'shadow_res', 'arcane_res', 'delay', 'ammo_type', 'spellid_1', 'spelltrigger_1', 'spellcharges_1', 'spellcooldown_1', 'spellcategory_1', 'spellcategorycooldown_1', 'spellid_2', 'spelltrigger_2', 'spellcharges_2', 'spellcooldown_2', 'spellcategory_2', 'spellcategorycooldown_2', 'spellid_3', 'spelltrigger_3', 'spellcharges_3', 'spellcooldown_3', 'spellcategory_3', 'spellcategorycooldown_3', 'spellid_4', 'spelltrigger_4', 'spellcharges_4', 'spellcooldown_4', 'spellcategory_4', 'spellcategorycooldown_4', 'spellid_5', 'spelltrigger_5', 'spellcharges_5', 'spellcooldown_5', 'spellcategory_5', 'spellcategorycooldown_5', 'bonding', 'PageText', 'LanguageID', 'PageMaterial', 'startquest', 'lockid', 'Material', 'sheath', 'RandomProperty', 'RandomSuffix', 'block', 'itemset', 'MaxDurability', 'area', 'Map', 'BagFamily', 'TotemCategory', 'socketColor_1', 'socketContent_1', 'socketColor_2', 'socketContent_2', 'socketColor_3', 'socketContent_3', 'socketBonus', 'GemProperties', 'RequiredDisenchantSkill', 'Duration', 'ItemLimitCategory', 'HolidayId', 'DisenchantID', 'FoodType', 'minMoneyLoot', 'maxMoneyLoot', 'ExtraFlags'], 'integer'],
            [['dmg_min1', 'dmg_max1', 'dmg_min2', 'dmg_max2', 'RangedModRange', 'spellppmRate_1', 'spellppmRate_2', 'spellppmRate_3', 'spellppmRate_4', 'spellppmRate_5', 'ArmorDamageModifier'], 'number'],
            [['name', 'description'], 'string', 'max' => 255],
            [['ScriptName'], 'string', 'max' => 64],
            [['entry'], 'unique'],
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
            'unk0' => Yii::t('common', 'Unk0'),
            'name' => Yii::t('common', 'Name'),
            'displayid' => Yii::t('common', 'Displayid'),
            'Quality' => Yii::t('common', 'Quality'),
            'Flags' => Yii::t('common', 'Flags'),
            'Flags2' => Yii::t('common', 'Flags2'),
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
            'Duration' => Yii::t('common', 'Duration'),
            'ItemLimitCategory' => Yii::t('common', 'Item Limit Category'),
            'HolidayId' => Yii::t('common', 'Holiday ID'),
            'ScriptName' => Yii::t('common', 'Script Name'),
            'DisenchantID' => Yii::t('common', 'Disenchant ID'),
            'FoodType' => Yii::t('common', 'Food Type'),
            'minMoneyLoot' => Yii::t('common', 'Min Money Loot'),
            'maxMoneyLoot' => Yii::t('common', 'Max Money Loot'),
            'ExtraFlags' => Yii::t('common', 'Extra Flags'),
        ];
    }
    
    public function getRelationIcon() {
        return $this->hasOne(ArmoryIcons::className(),['displayid' => 'displayid']);
    }
    
}
