<?php

namespace common\models\armory;

use Yii;

/**
 * This is the model class for table "armory_spell".
 *
 * @property integer $id
 * @property integer $Category
 * @property integer $Dispel
 * @property integer $Mechanic
 * @property integer $Attributes
 * @property integer $AttributesEx
 * @property integer $AttributesEx2
 * @property integer $AttributesEx3
 * @property integer $AttributesEx4
 * @property integer $AttributesEx5
 * @property integer $AttributesEx6
 * @property integer $unk_320_1
 * @property integer $Stances
 * @property integer $unk_320_2
 * @property integer $StancesNot
 * @property integer $unk_320_3
 * @property integer $Targets
 * @property integer $TargetCreatureType
 * @property integer $RequiresSpellFocus
 * @property integer $FacingCasterFlags
 * @property integer $CasterAuraState
 * @property integer $TargetAuraState
 * @property integer $CasterAuraStateNot
 * @property integer $TargetAuraStateNot
 * @property integer $casterAuraSpell
 * @property integer $targetAuraSpell
 * @property integer $excludeCasterAuraSpell
 * @property integer $excludeTargetAuraSpell
 * @property integer $CastingTimeIndex
 * @property integer $RecoveryTime
 * @property integer $CategoryRecoveryTime
 * @property integer $InterruptFlags
 * @property integer $AuraInterruptFlags
 * @property integer $ChannelInterruptFlags
 * @property integer $procFlags
 * @property integer $procChance
 * @property integer $procCharges
 * @property integer $maxLevel
 * @property integer $baseLevel
 * @property integer $spellLevel
 * @property integer $DurationIndex
 * @property integer $powerType
 * @property integer $manaCost
 * @property integer $manaCostPerlevel
 * @property integer $manaPerSecond
 * @property integer $manaPerSecondPerLevel
 * @property integer $rangeIndex
 * @property integer $speed
 * @property integer $modalNextSpell
 * @property integer $StackAmount
 * @property integer $Totem_1
 * @property integer $Totem_2
 * @property integer $Reagent_1
 * @property integer $Reagent_2
 * @property integer $Reagent_3
 * @property integer $Reagent_4
 * @property integer $Reagent_5
 * @property integer $Reagent_6
 * @property integer $Reagent_7
 * @property integer $Reagent_8
 * @property integer $ReagentCount_1
 * @property integer $ReagentCount_2
 * @property integer $ReagentCount_3
 * @property integer $ReagentCount_4
 * @property integer $ReagentCount_5
 * @property integer $ReagentCount_6
 * @property integer $ReagentCount_7
 * @property integer $ReagentCount_8
 * @property integer $EquippedItemClass
 * @property integer $EquippedItemSubClassMask
 * @property integer $EquippedItemInventoryTypeMask
 * @property integer $Effect_1
 * @property integer $Effect_2
 * @property integer $Effect_3
 * @property integer $EffectDieSides_1
 * @property integer $EffectDieSides_2
 * @property integer $EffectDieSides_3
 * @property integer $EffectBaseDice_1
 * @property integer $EffectBaseDice_2
 * @property integer $EffectBaseDice_3
 * @property integer $EffectRealPointsPerLevel_1
 * @property integer $EffectRealPointsPerLevel_2
 * @property integer $EffectRealPointsPerLevel_3
 * @property integer $EffectBasePoints_1
 * @property integer $EffectBasePoints_2
 * @property integer $EffectBasePoints_3
 * @property integer $EffectMechanic_1
 * @property integer $EffectMechanic_2
 * @property integer $EffectMechanic_3
 * @property integer $EffectImplicitTargetA_1
 * @property integer $EffectImplicitTargetA_2
 * @property integer $EffectImplicitTargetA_3
 * @property integer $EffectImplicitTargetB_1
 * @property integer $EffectImplicitTargetB_2
 * @property integer $EffectImplicitTargetB_3
 * @property integer $EffectRadiusIndex_1
 * @property integer $EffectRadiusIndex_2
 * @property integer $EffectRadiusIndex_3
 * @property integer $EffectApplyAuraName_1
 * @property integer $EffectApplyAuraName_2
 * @property integer $EffectApplyAuraName_3
 * @property integer $EffectAmplitude_1
 * @property integer $EffectAmplitude_2
 * @property integer $EffectAmplitude_3
 * @property integer $EffectMultipleValue_1
 * @property integer $EffectMultipleValue_2
 * @property integer $EffectMultipleValue_3
 * @property integer $EffectChainTarget_1
 * @property integer $EffectChainTarget_2
 * @property integer $EffectChainTarget_3
 * @property integer $EffectItemType_1
 * @property integer $EffectItemType_2
 * @property integer $EffectItemType_3
 * @property integer $EffectMiscValue_1
 * @property integer $EffectMiscValue_2
 * @property integer $EffectMiscValue_3
 * @property integer $EffectMiscValueB_1
 * @property integer $EffectMiscValueB_2
 * @property integer $EffectMiscValueB_3
 * @property integer $EffectTriggerSpell_1
 * @property integer $EffectTriggerSpell_2
 * @property integer $EffectTriggerSpell_3
 * @property integer $EffectPointsPerComboPoint_1
 * @property integer $EffectPointsPerComboPoint_2
 * @property integer $EffectPointsPerComboPoint_3
 * @property integer $EffectSpellClassMaskA_1
 * @property integer $EffectSpellClassMaskA_2
 * @property integer $EffectSpellClassMaskA_3
 * @property integer $EffectSpellClassMaskB_1
 * @property integer $EffectSpellClassMaskB_2
 * @property integer $EffectSpellClassMaskB_3
 * @property integer $EffectSpellClassMaskC_1
 * @property integer $EffectSpellClassMaskC_2
 * @property integer $EffectSpellClassMaskC_3
 * @property integer $SpellVisual_1
 * @property integer $SpellVisual_2
 * @property integer $SpellIconID
 * @property integer $activeIconID
 * @property integer $spellPriority
 * @property string $SpellName_en_gb
 * @property string $SpellName_de_de
 * @property string $SpellName_fr_fr
 * @property string $SpellName_zh_cn
 * @property string $SpellName_5
 * @property string $SpellName_6
 * @property string $SpellName_es_es
 * @property string $SpellName_8
 * @property string $SpellName_ru_ru
 * @property string $SpellName_10
 * @property string $SpellName_11
 * @property string $SpellName_12
 * @property string $SpellName_13
 * @property string $SpellName_14
 * @property string $SpellName_15
 * @property string $SpellName_16
 * @property integer $SpellNameFlag
 * @property string $Rank_1
 * @property string $Rank_2
 * @property string $Rank_fr_fr
 * @property string $Rank_zh_cn
 * @property string $Rank_5
 * @property string $Rank_6
 * @property string $Rank_es_es
 * @property string $Rank_8
 * @property string $Rank_ru_ru
 * @property string $Rank_10
 * @property string $Rank_11
 * @property string $Rank_12
 * @property string $Rank_13
 * @property string $Rank_14
 * @property string $Rank_15
 * @property string $Rank_16
 * @property integer $RankFlags
 * @property string $Description_en_gb
 * @property string $Description_de_de
 * @property string $Description_fr_fr
 * @property string $Description_zh_cn
 * @property string $Description_5
 * @property string $Description_6
 * @property string $Description_es_es
 * @property string $Description_8
 * @property string $Description_ru_ru
 * @property string $Description_10
 * @property string $Description_11
 * @property string $Description_12
 * @property string $Description_13
 * @property string $Description_14
 * @property string $Description_15
 * @property string $Description_16
 * @property integer $DescriptionFlags
 * @property string $ToolTip_1
 * @property string $ToolTip_de_de
 * @property string $Tooltip_fr_fr
 * @property string $Tooltip_zh_cn
 * @property string $ToolTip_5
 * @property string $ToolTip_6
 * @property string $Tooltip_es_es
 * @property string $ToolTip_8
 * @property string $Tooltip_ru_ru
 * @property string $ToolTip_10
 * @property string $ToolTip_11
 * @property string $ToolTip_12
 * @property string $ToolTip_13
 * @property string $ToolTip_14
 * @property string $ToolTip_15
 * @property string $ToolTip_16
 * @property integer $ToolTipFlags
 * @property integer $ManaCostPercentage
 * @property integer $StartRecoveryCategory
 * @property integer $StartRecoveryTime
 * @property integer $MaxTargetLevel
 * @property integer $SpellFamilyName
 * @property integer $SpellFamilyFlags
 * @property integer $SpellFamilyFlags2
 * @property integer $MaxAffectedTargets
 * @property integer $DmgClass
 * @property integer $PreventionType
 * @property integer $StanceBarOrder
 * @property integer $DmgMultiplier_1
 * @property integer $DmgMultiplier_2
 * @property integer $DmgMultiplier_3
 * @property integer $MinFactionId
 * @property integer $MinReputation
 * @property integer $RequiredAuraVision
 * @property integer $TotemCategory_1
 * @property integer $TotemCategory_2
 * @property integer $AreaGroupId
 * @property integer $SchoolMask
 * @property integer $runeCostID
 * @property integer $spellMissileID
 * @property integer $PowerDisplayId
 * @property integer $unk_320_4_1
 * @property integer $unk_320_4_2
 * @property integer $unk_320_4_3
 * @property integer $spellDescriptionVariableID
 * @property integer $SpellDifficultyId
 * @property integer $f_234
 */
class ArmorySpell extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'armory_spell';
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
            [['id', 'Category', 'Dispel', 'Mechanic', 'Attributes', 'AttributesEx', 'AttributesEx2', 'AttributesEx3', 'AttributesEx4', 'AttributesEx5', 'AttributesEx6', 'unk_320_1', 'Stances', 'unk_320_2', 'StancesNot', 'unk_320_3', 'Targets', 'TargetCreatureType', 'RequiresSpellFocus', 'FacingCasterFlags', 'CasterAuraState', 'TargetAuraState', 'CasterAuraStateNot', 'TargetAuraStateNot', 'casterAuraSpell', 'targetAuraSpell', 'excludeCasterAuraSpell', 'excludeTargetAuraSpell', 'CastingTimeIndex', 'RecoveryTime', 'CategoryRecoveryTime', 'InterruptFlags', 'AuraInterruptFlags', 'ChannelInterruptFlags', 'procFlags', 'procChance', 'procCharges', 'maxLevel', 'baseLevel', 'spellLevel', 'DurationIndex', 'powerType', 'manaCost', 'manaCostPerlevel', 'manaPerSecond', 'manaPerSecondPerLevel', 'rangeIndex', 'speed', 'modalNextSpell', 'StackAmount', 'Totem_1', 'Totem_2', 'Reagent_1', 'Reagent_2', 'Reagent_3', 'Reagent_4', 'Reagent_5', 'Reagent_6', 'Reagent_7', 'Reagent_8', 'ReagentCount_1', 'ReagentCount_2', 'ReagentCount_3', 'ReagentCount_4', 'ReagentCount_5', 'ReagentCount_6', 'ReagentCount_7', 'ReagentCount_8', 'EquippedItemClass', 'EquippedItemSubClassMask', 'EquippedItemInventoryTypeMask', 'Effect_1', 'Effect_2', 'Effect_3', 'EffectDieSides_1', 'EffectDieSides_2', 'EffectDieSides_3', 'EffectBaseDice_1', 'EffectBaseDice_2', 'EffectBaseDice_3', 'EffectRealPointsPerLevel_1', 'EffectRealPointsPerLevel_2', 'EffectRealPointsPerLevel_3', 'EffectBasePoints_1', 'EffectBasePoints_2', 'EffectBasePoints_3', 'EffectMechanic_1', 'EffectMechanic_2', 'EffectMechanic_3', 'EffectImplicitTargetA_1', 'EffectImplicitTargetA_2', 'EffectImplicitTargetA_3', 'EffectImplicitTargetB_1', 'EffectImplicitTargetB_2', 'EffectImplicitTargetB_3', 'EffectRadiusIndex_1', 'EffectRadiusIndex_2', 'EffectRadiusIndex_3', 'EffectApplyAuraName_1', 'EffectApplyAuraName_2', 'EffectApplyAuraName_3', 'EffectAmplitude_1', 'EffectAmplitude_2', 'EffectAmplitude_3', 'EffectMultipleValue_1', 'EffectMultipleValue_2', 'EffectMultipleValue_3', 'EffectChainTarget_1', 'EffectChainTarget_2', 'EffectChainTarget_3', 'EffectItemType_1', 'EffectItemType_2', 'EffectItemType_3', 'EffectMiscValue_1', 'EffectMiscValue_2', 'EffectMiscValue_3', 'EffectMiscValueB_1', 'EffectMiscValueB_2', 'EffectMiscValueB_3', 'EffectTriggerSpell_1', 'EffectTriggerSpell_2', 'EffectTriggerSpell_3', 'EffectPointsPerComboPoint_1', 'EffectPointsPerComboPoint_2', 'EffectPointsPerComboPoint_3', 'EffectSpellClassMaskA_1', 'EffectSpellClassMaskA_2', 'EffectSpellClassMaskA_3', 'EffectSpellClassMaskB_1', 'EffectSpellClassMaskB_2', 'EffectSpellClassMaskB_3', 'EffectSpellClassMaskC_1', 'EffectSpellClassMaskC_2', 'EffectSpellClassMaskC_3', 'SpellVisual_1', 'SpellVisual_2', 'SpellIconID', 'activeIconID', 'spellPriority', 'SpellName_de_de', 'SpellName_5', 'SpellName_6', 'SpellName_8', 'SpellName_10', 'SpellName_11', 'SpellName_12', 'SpellName_13', 'SpellName_14', 'SpellName_15', 'SpellName_16', 'SpellNameFlag', 'Rank_1', 'Rank_2', 'Rank_5', 'Rank_6', 'Rank_8', 'Rank_10', 'Rank_11', 'Rank_12', 'Rank_13', 'Rank_14', 'Rank_15', 'Rank_16', 'RankFlags', 'Description_de_de', 'Description_5', 'Description_6', 'Description_8', 'Description_10', 'Description_11', 'Description_12', 'Description_13', 'Description_14', 'Description_15', 'Description_16', 'DescriptionFlags', 'ToolTip_1', 'ToolTip_de_de', 'ToolTip_5', 'ToolTip_6', 'ToolTip_8', 'ToolTip_10', 'ToolTip_11', 'ToolTip_12', 'ToolTip_13', 'ToolTip_14', 'ToolTip_15', 'ToolTip_16', 'ToolTipFlags', 'ManaCostPercentage', 'StartRecoveryCategory', 'StartRecoveryTime', 'MaxTargetLevel', 'SpellFamilyName', 'SpellFamilyFlags', 'SpellFamilyFlags2', 'MaxAffectedTargets', 'DmgClass', 'PreventionType', 'StanceBarOrder', 'DmgMultiplier_1', 'DmgMultiplier_2', 'DmgMultiplier_3', 'MinFactionId', 'MinReputation', 'RequiredAuraVision', 'TotemCategory_1', 'TotemCategory_2', 'AreaGroupId', 'SchoolMask', 'runeCostID', 'spellMissileID', 'PowerDisplayId', 'unk_320_4_1', 'unk_320_4_2', 'unk_320_4_3', 'spellDescriptionVariableID', 'SpellDifficultyId', 'f_234'], 'required'],
            [['id', 'Category', 'Dispel', 'Mechanic', 'Attributes', 'AttributesEx', 'AttributesEx2', 'AttributesEx3', 'AttributesEx4', 'AttributesEx5', 'AttributesEx6', 'unk_320_1', 'Stances', 'unk_320_2', 'StancesNot', 'unk_320_3', 'Targets', 'TargetCreatureType', 'RequiresSpellFocus', 'FacingCasterFlags', 'CasterAuraState', 'TargetAuraState', 'CasterAuraStateNot', 'TargetAuraStateNot', 'casterAuraSpell', 'targetAuraSpell', 'excludeCasterAuraSpell', 'excludeTargetAuraSpell', 'CastingTimeIndex', 'RecoveryTime', 'CategoryRecoveryTime', 'InterruptFlags', 'AuraInterruptFlags', 'ChannelInterruptFlags', 'procFlags', 'procChance', 'procCharges', 'maxLevel', 'baseLevel', 'spellLevel', 'DurationIndex', 'powerType', 'manaCost', 'manaCostPerlevel', 'manaPerSecond', 'manaPerSecondPerLevel', 'rangeIndex', 'speed', 'modalNextSpell', 'StackAmount', 'Totem_1', 'Totem_2', 'Reagent_1', 'Reagent_2', 'Reagent_3', 'Reagent_4', 'Reagent_5', 'Reagent_6', 'Reagent_7', 'Reagent_8', 'ReagentCount_1', 'ReagentCount_2', 'ReagentCount_3', 'ReagentCount_4', 'ReagentCount_5', 'ReagentCount_6', 'ReagentCount_7', 'ReagentCount_8', 'EquippedItemClass', 'EquippedItemSubClassMask', 'EquippedItemInventoryTypeMask', 'Effect_1', 'Effect_2', 'Effect_3', 'EffectDieSides_1', 'EffectDieSides_2', 'EffectDieSides_3', 'EffectBaseDice_1', 'EffectBaseDice_2', 'EffectBaseDice_3', 'EffectRealPointsPerLevel_1', 'EffectRealPointsPerLevel_2', 'EffectRealPointsPerLevel_3', 'EffectBasePoints_1', 'EffectBasePoints_2', 'EffectBasePoints_3', 'EffectMechanic_1', 'EffectMechanic_2', 'EffectMechanic_3', 'EffectImplicitTargetA_1', 'EffectImplicitTargetA_2', 'EffectImplicitTargetA_3', 'EffectImplicitTargetB_1', 'EffectImplicitTargetB_2', 'EffectImplicitTargetB_3', 'EffectRadiusIndex_1', 'EffectRadiusIndex_2', 'EffectRadiusIndex_3', 'EffectApplyAuraName_1', 'EffectApplyAuraName_2', 'EffectApplyAuraName_3', 'EffectAmplitude_1', 'EffectAmplitude_2', 'EffectAmplitude_3', 'EffectMultipleValue_1', 'EffectMultipleValue_2', 'EffectMultipleValue_3', 'EffectChainTarget_1', 'EffectChainTarget_2', 'EffectChainTarget_3', 'EffectItemType_1', 'EffectItemType_2', 'EffectItemType_3', 'EffectMiscValue_1', 'EffectMiscValue_2', 'EffectMiscValue_3', 'EffectMiscValueB_1', 'EffectMiscValueB_2', 'EffectMiscValueB_3', 'EffectTriggerSpell_1', 'EffectTriggerSpell_2', 'EffectTriggerSpell_3', 'EffectPointsPerComboPoint_1', 'EffectPointsPerComboPoint_2', 'EffectPointsPerComboPoint_3', 'EffectSpellClassMaskA_1', 'EffectSpellClassMaskA_2', 'EffectSpellClassMaskA_3', 'EffectSpellClassMaskB_1', 'EffectSpellClassMaskB_2', 'EffectSpellClassMaskB_3', 'EffectSpellClassMaskC_1', 'EffectSpellClassMaskC_2', 'EffectSpellClassMaskC_3', 'SpellVisual_1', 'SpellVisual_2', 'SpellIconID', 'activeIconID', 'spellPriority', 'SpellNameFlag', 'RankFlags', 'DescriptionFlags', 'ToolTipFlags', 'ManaCostPercentage', 'StartRecoveryCategory', 'StartRecoveryTime', 'MaxTargetLevel', 'SpellFamilyName', 'SpellFamilyFlags', 'SpellFamilyFlags2', 'MaxAffectedTargets', 'DmgClass', 'PreventionType', 'StanceBarOrder', 'DmgMultiplier_1', 'DmgMultiplier_2', 'DmgMultiplier_3', 'MinFactionId', 'MinReputation', 'RequiredAuraVision', 'TotemCategory_1', 'TotemCategory_2', 'AreaGroupId', 'SchoolMask', 'runeCostID', 'spellMissileID', 'PowerDisplayId', 'unk_320_4_1', 'unk_320_4_2', 'unk_320_4_3', 'spellDescriptionVariableID', 'SpellDifficultyId', 'f_234'], 'integer'],
            [['SpellName_en_gb', 'SpellName_de_de', 'SpellName_fr_fr', 'SpellName_zh_cn', 'SpellName_5', 'SpellName_6', 'SpellName_es_es', 'SpellName_8', 'SpellName_ru_ru', 'SpellName_10', 'SpellName_11', 'SpellName_12', 'SpellName_13', 'SpellName_14', 'SpellName_15', 'SpellName_16', 'Rank_1', 'Rank_2', 'Rank_fr_fr', 'Rank_zh_cn', 'Rank_5', 'Rank_6', 'Rank_es_es', 'Rank_8', 'Rank_ru_ru', 'Rank_10', 'Rank_11', 'Rank_12', 'Rank_13', 'Rank_14', 'Rank_15', 'Rank_16', 'Description_en_gb', 'Description_de_de', 'Description_fr_fr', 'Description_zh_cn', 'Description_5', 'Description_6', 'Description_es_es', 'Description_8', 'Description_ru_ru', 'Description_10', 'Description_11', 'Description_12', 'Description_13', 'Description_14', 'Description_15', 'Description_16', 'ToolTip_1', 'ToolTip_de_de', 'Tooltip_fr_fr', 'Tooltip_zh_cn', 'ToolTip_5', 'ToolTip_6', 'Tooltip_es_es', 'ToolTip_8', 'Tooltip_ru_ru', 'ToolTip_10', 'ToolTip_11', 'ToolTip_12', 'ToolTip_13', 'ToolTip_14', 'ToolTip_15', 'ToolTip_16'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'Category' => Yii::t('common', 'Category'),
            'Dispel' => Yii::t('common', 'Dispel'),
            'Mechanic' => Yii::t('common', 'Mechanic'),
            'Attributes' => Yii::t('common', 'Attributes'),
            'AttributesEx' => Yii::t('common', 'Attributes Ex'),
            'AttributesEx2' => Yii::t('common', 'Attributes Ex2'),
            'AttributesEx3' => Yii::t('common', 'Attributes Ex3'),
            'AttributesEx4' => Yii::t('common', 'Attributes Ex4'),
            'AttributesEx5' => Yii::t('common', 'Attributes Ex5'),
            'AttributesEx6' => Yii::t('common', 'Attributes Ex6'),
            'unk_320_1' => Yii::t('common', 'Unk 320 1'),
            'Stances' => Yii::t('common', 'Stances'),
            'unk_320_2' => Yii::t('common', 'Unk 320 2'),
            'StancesNot' => Yii::t('common', 'Stances Not'),
            'unk_320_3' => Yii::t('common', 'Unk 320 3'),
            'Targets' => Yii::t('common', 'Targets'),
            'TargetCreatureType' => Yii::t('common', 'Target Creature Type'),
            'RequiresSpellFocus' => Yii::t('common', 'Requires Spell Focus'),
            'FacingCasterFlags' => Yii::t('common', 'Facing Caster Flags'),
            'CasterAuraState' => Yii::t('common', 'Caster Aura State'),
            'TargetAuraState' => Yii::t('common', 'Target Aura State'),
            'CasterAuraStateNot' => Yii::t('common', 'Caster Aura State Not'),
            'TargetAuraStateNot' => Yii::t('common', 'Target Aura State Not'),
            'casterAuraSpell' => Yii::t('common', 'Caster Aura Spell'),
            'targetAuraSpell' => Yii::t('common', 'Target Aura Spell'),
            'excludeCasterAuraSpell' => Yii::t('common', 'Exclude Caster Aura Spell'),
            'excludeTargetAuraSpell' => Yii::t('common', 'Exclude Target Aura Spell'),
            'CastingTimeIndex' => Yii::t('common', 'Casting Time Index'),
            'RecoveryTime' => Yii::t('common', 'Recovery Time'),
            'CategoryRecoveryTime' => Yii::t('common', 'Category Recovery Time'),
            'InterruptFlags' => Yii::t('common', 'Interrupt Flags'),
            'AuraInterruptFlags' => Yii::t('common', 'Aura Interrupt Flags'),
            'ChannelInterruptFlags' => Yii::t('common', 'Channel Interrupt Flags'),
            'procFlags' => Yii::t('common', 'Proc Flags'),
            'procChance' => Yii::t('common', 'Proc Chance'),
            'procCharges' => Yii::t('common', 'Proc Charges'),
            'maxLevel' => Yii::t('common', 'Max Level'),
            'baseLevel' => Yii::t('common', 'Base Level'),
            'spellLevel' => Yii::t('common', 'Spell Level'),
            'DurationIndex' => Yii::t('common', 'Duration Index'),
            'powerType' => Yii::t('common', 'Power Type'),
            'manaCost' => Yii::t('common', 'Mana Cost'),
            'manaCostPerlevel' => Yii::t('common', 'Mana Cost Perlevel'),
            'manaPerSecond' => Yii::t('common', 'Mana Per Second'),
            'manaPerSecondPerLevel' => Yii::t('common', 'Mana Per Second Per Level'),
            'rangeIndex' => Yii::t('common', 'Range Index'),
            'speed' => Yii::t('common', 'Speed'),
            'modalNextSpell' => Yii::t('common', 'Modal Next Spell'),
            'StackAmount' => Yii::t('common', 'Stack Amount'),
            'Totem_1' => Yii::t('common', 'Totem 1'),
            'Totem_2' => Yii::t('common', 'Totem 2'),
            'Reagent_1' => Yii::t('common', 'Reagent 1'),
            'Reagent_2' => Yii::t('common', 'Reagent 2'),
            'Reagent_3' => Yii::t('common', 'Reagent 3'),
            'Reagent_4' => Yii::t('common', 'Reagent 4'),
            'Reagent_5' => Yii::t('common', 'Reagent 5'),
            'Reagent_6' => Yii::t('common', 'Reagent 6'),
            'Reagent_7' => Yii::t('common', 'Reagent 7'),
            'Reagent_8' => Yii::t('common', 'Reagent 8'),
            'ReagentCount_1' => Yii::t('common', 'Reagent Count 1'),
            'ReagentCount_2' => Yii::t('common', 'Reagent Count 2'),
            'ReagentCount_3' => Yii::t('common', 'Reagent Count 3'),
            'ReagentCount_4' => Yii::t('common', 'Reagent Count 4'),
            'ReagentCount_5' => Yii::t('common', 'Reagent Count 5'),
            'ReagentCount_6' => Yii::t('common', 'Reagent Count 6'),
            'ReagentCount_7' => Yii::t('common', 'Reagent Count 7'),
            'ReagentCount_8' => Yii::t('common', 'Reagent Count 8'),
            'EquippedItemClass' => Yii::t('common', 'Equipped Item Class'),
            'EquippedItemSubClassMask' => Yii::t('common', 'Equipped Item Sub Class Mask'),
            'EquippedItemInventoryTypeMask' => Yii::t('common', 'Equipped Item Inventory Type Mask'),
            'Effect_1' => Yii::t('common', 'Effect 1'),
            'Effect_2' => Yii::t('common', 'Effect 2'),
            'Effect_3' => Yii::t('common', 'Effect 3'),
            'EffectDieSides_1' => Yii::t('common', 'Effect Die Sides 1'),
            'EffectDieSides_2' => Yii::t('common', 'Effect Die Sides 2'),
            'EffectDieSides_3' => Yii::t('common', 'Effect Die Sides 3'),
            'EffectBaseDice_1' => Yii::t('common', 'Effect Base Dice 1'),
            'EffectBaseDice_2' => Yii::t('common', 'Effect Base Dice 2'),
            'EffectBaseDice_3' => Yii::t('common', 'Effect Base Dice 3'),
            'EffectRealPointsPerLevel_1' => Yii::t('common', 'Effect Real Points Per Level 1'),
            'EffectRealPointsPerLevel_2' => Yii::t('common', 'Effect Real Points Per Level 2'),
            'EffectRealPointsPerLevel_3' => Yii::t('common', 'Effect Real Points Per Level 3'),
            'EffectBasePoints_1' => Yii::t('common', 'Effect Base Points 1'),
            'EffectBasePoints_2' => Yii::t('common', 'Effect Base Points 2'),
            'EffectBasePoints_3' => Yii::t('common', 'Effect Base Points 3'),
            'EffectMechanic_1' => Yii::t('common', 'Effect Mechanic 1'),
            'EffectMechanic_2' => Yii::t('common', 'Effect Mechanic 2'),
            'EffectMechanic_3' => Yii::t('common', 'Effect Mechanic 3'),
            'EffectImplicitTargetA_1' => Yii::t('common', 'Effect Implicit Target A 1'),
            'EffectImplicitTargetA_2' => Yii::t('common', 'Effect Implicit Target A 2'),
            'EffectImplicitTargetA_3' => Yii::t('common', 'Effect Implicit Target A 3'),
            'EffectImplicitTargetB_1' => Yii::t('common', 'Effect Implicit Target B 1'),
            'EffectImplicitTargetB_2' => Yii::t('common', 'Effect Implicit Target B 2'),
            'EffectImplicitTargetB_3' => Yii::t('common', 'Effect Implicit Target B 3'),
            'EffectRadiusIndex_1' => Yii::t('common', 'Effect Radius Index 1'),
            'EffectRadiusIndex_2' => Yii::t('common', 'Effect Radius Index 2'),
            'EffectRadiusIndex_3' => Yii::t('common', 'Effect Radius Index 3'),
            'EffectApplyAuraName_1' => Yii::t('common', 'Effect Apply Aura Name 1'),
            'EffectApplyAuraName_2' => Yii::t('common', 'Effect Apply Aura Name 2'),
            'EffectApplyAuraName_3' => Yii::t('common', 'Effect Apply Aura Name 3'),
            'EffectAmplitude_1' => Yii::t('common', 'Effect Amplitude 1'),
            'EffectAmplitude_2' => Yii::t('common', 'Effect Amplitude 2'),
            'EffectAmplitude_3' => Yii::t('common', 'Effect Amplitude 3'),
            'EffectMultipleValue_1' => Yii::t('common', 'Effect Multiple Value 1'),
            'EffectMultipleValue_2' => Yii::t('common', 'Effect Multiple Value 2'),
            'EffectMultipleValue_3' => Yii::t('common', 'Effect Multiple Value 3'),
            'EffectChainTarget_1' => Yii::t('common', 'Effect Chain Target 1'),
            'EffectChainTarget_2' => Yii::t('common', 'Effect Chain Target 2'),
            'EffectChainTarget_3' => Yii::t('common', 'Effect Chain Target 3'),
            'EffectItemType_1' => Yii::t('common', 'Effect Item Type 1'),
            'EffectItemType_2' => Yii::t('common', 'Effect Item Type 2'),
            'EffectItemType_3' => Yii::t('common', 'Effect Item Type 3'),
            'EffectMiscValue_1' => Yii::t('common', 'Effect Misc Value 1'),
            'EffectMiscValue_2' => Yii::t('common', 'Effect Misc Value 2'),
            'EffectMiscValue_3' => Yii::t('common', 'Effect Misc Value 3'),
            'EffectMiscValueB_1' => Yii::t('common', 'Effect Misc Value B 1'),
            'EffectMiscValueB_2' => Yii::t('common', 'Effect Misc Value B 2'),
            'EffectMiscValueB_3' => Yii::t('common', 'Effect Misc Value B 3'),
            'EffectTriggerSpell_1' => Yii::t('common', 'Effect Trigger Spell 1'),
            'EffectTriggerSpell_2' => Yii::t('common', 'Effect Trigger Spell 2'),
            'EffectTriggerSpell_3' => Yii::t('common', 'Effect Trigger Spell 3'),
            'EffectPointsPerComboPoint_1' => Yii::t('common', 'Effect Points Per Combo Point 1'),
            'EffectPointsPerComboPoint_2' => Yii::t('common', 'Effect Points Per Combo Point 2'),
            'EffectPointsPerComboPoint_3' => Yii::t('common', 'Effect Points Per Combo Point 3'),
            'EffectSpellClassMaskA_1' => Yii::t('common', 'Effect Spell Class Mask A 1'),
            'EffectSpellClassMaskA_2' => Yii::t('common', 'Effect Spell Class Mask A 2'),
            'EffectSpellClassMaskA_3' => Yii::t('common', 'Effect Spell Class Mask A 3'),
            'EffectSpellClassMaskB_1' => Yii::t('common', 'Effect Spell Class Mask B 1'),
            'EffectSpellClassMaskB_2' => Yii::t('common', 'Effect Spell Class Mask B 2'),
            'EffectSpellClassMaskB_3' => Yii::t('common', 'Effect Spell Class Mask B 3'),
            'EffectSpellClassMaskC_1' => Yii::t('common', 'Effect Spell Class Mask C 1'),
            'EffectSpellClassMaskC_2' => Yii::t('common', 'Effect Spell Class Mask C 2'),
            'EffectSpellClassMaskC_3' => Yii::t('common', 'Effect Spell Class Mask C 3'),
            'SpellVisual_1' => Yii::t('common', 'Spell Visual 1'),
            'SpellVisual_2' => Yii::t('common', 'Spell Visual 2'),
            'SpellIconID' => Yii::t('common', 'Spell Icon ID'),
            'activeIconID' => Yii::t('common', 'Active Icon ID'),
            'spellPriority' => Yii::t('common', 'Spell Priority'),
            'SpellName_en_gb' => Yii::t('common', 'Spell Name En Gb'),
            'SpellName_de_de' => Yii::t('common', 'Spell Name De De'),
            'SpellName_fr_fr' => Yii::t('common', 'Spell Name Fr Fr'),
            'SpellName_zh_cn' => Yii::t('common', 'Spell Name Zh Cn'),
            'SpellName_5' => Yii::t('common', 'Spell Name 5'),
            'SpellName_6' => Yii::t('common', 'Spell Name 6'),
            'SpellName_es_es' => Yii::t('common', 'Spell Name Es Es'),
            'SpellName_8' => Yii::t('common', 'Spell Name 8'),
            'SpellName_ru_ru' => Yii::t('common', 'Spell Name Ru Ru'),
            'SpellName_10' => Yii::t('common', 'Spell Name 10'),
            'SpellName_11' => Yii::t('common', 'Spell Name 11'),
            'SpellName_12' => Yii::t('common', 'Spell Name 12'),
            'SpellName_13' => Yii::t('common', 'Spell Name 13'),
            'SpellName_14' => Yii::t('common', 'Spell Name 14'),
            'SpellName_15' => Yii::t('common', 'Spell Name 15'),
            'SpellName_16' => Yii::t('common', 'Spell Name 16'),
            'SpellNameFlag' => Yii::t('common', 'Spell Name Flag'),
            'Rank_1' => Yii::t('common', 'Rank 1'),
            'Rank_2' => Yii::t('common', 'Rank 2'),
            'Rank_fr_fr' => Yii::t('common', 'Rank Fr Fr'),
            'Rank_zh_cn' => Yii::t('common', 'Rank Zh Cn'),
            'Rank_5' => Yii::t('common', 'Rank 5'),
            'Rank_6' => Yii::t('common', 'Rank 6'),
            'Rank_es_es' => Yii::t('common', 'Rank Es Es'),
            'Rank_8' => Yii::t('common', 'Rank 8'),
            'Rank_ru_ru' => Yii::t('common', 'Rank Ru Ru'),
            'Rank_10' => Yii::t('common', 'Rank 10'),
            'Rank_11' => Yii::t('common', 'Rank 11'),
            'Rank_12' => Yii::t('common', 'Rank 12'),
            'Rank_13' => Yii::t('common', 'Rank 13'),
            'Rank_14' => Yii::t('common', 'Rank 14'),
            'Rank_15' => Yii::t('common', 'Rank 15'),
            'Rank_16' => Yii::t('common', 'Rank 16'),
            'RankFlags' => Yii::t('common', 'Rank Flags'),
            'Description_en_gb' => Yii::t('common', 'Description En Gb'),
            'Description_de_de' => Yii::t('common', 'Description De De'),
            'Description_fr_fr' => Yii::t('common', 'Description Fr Fr'),
            'Description_zh_cn' => Yii::t('common', 'Description Zh Cn'),
            'Description_5' => Yii::t('common', 'Description 5'),
            'Description_6' => Yii::t('common', 'Description 6'),
            'Description_es_es' => Yii::t('common', 'Description Es Es'),
            'Description_8' => Yii::t('common', 'Description 8'),
            'Description_ru_ru' => Yii::t('common', 'Description Ru Ru'),
            'Description_10' => Yii::t('common', 'Description 10'),
            'Description_11' => Yii::t('common', 'Description 11'),
            'Description_12' => Yii::t('common', 'Description 12'),
            'Description_13' => Yii::t('common', 'Description 13'),
            'Description_14' => Yii::t('common', 'Description 14'),
            'Description_15' => Yii::t('common', 'Description 15'),
            'Description_16' => Yii::t('common', 'Description 16'),
            'DescriptionFlags' => Yii::t('common', 'Description Flags'),
            'ToolTip_1' => Yii::t('common', 'Tool Tip 1'),
            'ToolTip_de_de' => Yii::t('common', 'Tool Tip De De'),
            'Tooltip_fr_fr' => Yii::t('common', 'Tooltip Fr Fr'),
            'Tooltip_zh_cn' => Yii::t('common', 'Tooltip Zh Cn'),
            'ToolTip_5' => Yii::t('common', 'Tool Tip 5'),
            'ToolTip_6' => Yii::t('common', 'Tool Tip 6'),
            'Tooltip_es_es' => Yii::t('common', 'Tooltip Es Es'),
            'ToolTip_8' => Yii::t('common', 'Tool Tip 8'),
            'Tooltip_ru_ru' => Yii::t('common', 'Tooltip Ru Ru'),
            'ToolTip_10' => Yii::t('common', 'Tool Tip 10'),
            'ToolTip_11' => Yii::t('common', 'Tool Tip 11'),
            'ToolTip_12' => Yii::t('common', 'Tool Tip 12'),
            'ToolTip_13' => Yii::t('common', 'Tool Tip 13'),
            'ToolTip_14' => Yii::t('common', 'Tool Tip 14'),
            'ToolTip_15' => Yii::t('common', 'Tool Tip 15'),
            'ToolTip_16' => Yii::t('common', 'Tool Tip 16'),
            'ToolTipFlags' => Yii::t('common', 'Tool Tip Flags'),
            'ManaCostPercentage' => Yii::t('common', 'Mana Cost Percentage'),
            'StartRecoveryCategory' => Yii::t('common', 'Start Recovery Category'),
            'StartRecoveryTime' => Yii::t('common', 'Start Recovery Time'),
            'MaxTargetLevel' => Yii::t('common', 'Max Target Level'),
            'SpellFamilyName' => Yii::t('common', 'Spell Family Name'),
            'SpellFamilyFlags' => Yii::t('common', 'Spell Family Flags'),
            'SpellFamilyFlags2' => Yii::t('common', 'Spell Family Flags2'),
            'MaxAffectedTargets' => Yii::t('common', 'Max Affected Targets'),
            'DmgClass' => Yii::t('common', 'Dmg Class'),
            'PreventionType' => Yii::t('common', 'Prevention Type'),
            'StanceBarOrder' => Yii::t('common', 'Stance Bar Order'),
            'DmgMultiplier_1' => Yii::t('common', 'Dmg Multiplier 1'),
            'DmgMultiplier_2' => Yii::t('common', 'Dmg Multiplier 2'),
            'DmgMultiplier_3' => Yii::t('common', 'Dmg Multiplier 3'),
            'MinFactionId' => Yii::t('common', 'Min Faction ID'),
            'MinReputation' => Yii::t('common', 'Min Reputation'),
            'RequiredAuraVision' => Yii::t('common', 'Required Aura Vision'),
            'TotemCategory_1' => Yii::t('common', 'Totem Category 1'),
            'TotemCategory_2' => Yii::t('common', 'Totem Category 2'),
            'AreaGroupId' => Yii::t('common', 'Area Group ID'),
            'SchoolMask' => Yii::t('common', 'School Mask'),
            'runeCostID' => Yii::t('common', 'Rune Cost ID'),
            'spellMissileID' => Yii::t('common', 'Spell Missile ID'),
            'PowerDisplayId' => Yii::t('common', 'Power Display ID'),
            'unk_320_4_1' => Yii::t('common', 'Unk 320 4 1'),
            'unk_320_4_2' => Yii::t('common', 'Unk 320 4 2'),
            'unk_320_4_3' => Yii::t('common', 'Unk 320 4 3'),
            'spellDescriptionVariableID' => Yii::t('common', 'Spell Description Variable ID'),
            'SpellDifficultyId' => Yii::t('common', 'Spell Difficulty ID'),
            'f_234' => Yii::t('common', 'F 234'),
        ];
    }

    public function getRelationIcon() {
        return $this->hasOne(ArmorySpellIcon::className(),['Id' => 'SpellIconID']);
    }

}