<?php

namespace common\models\armory;

use Yii;

/**
 * This is the model class for table "armory_rating".
 *
 * @property integer $level
 * @property double $MC_Warrior
 * @property double $MC_Paladin
 * @property double $MC_Hunter
 * @property double $MC_Rogue
 * @property double $MC_Priest
 * @property double $MC_DeathKnight
 * @property double $MC_Shaman
 * @property double $MC_Mage
 * @property double $MC_Warlock
 * @property double $MC_10
 * @property double $MC_Druid
 * @property double $SC_Warrior
 * @property double $SC_Paladin
 * @property double $SC_Hunter
 * @property double $SC_Rogue
 * @property double $SC_Priest
 * @property double $SC_DeathKnight
 * @property double $SC_Shaman
 * @property double $SC_Mage
 * @property double $SC_Warlock
 * @property double $SC_10
 * @property double $SC_Druid
 * @property double $HR_Warrior
 * @property double $HR_Paladin
 * @property double $HR_Hunter
 * @property double $HR_Rogue
 * @property double $HR_Priest
 * @property double $HR_DeathKnight
 * @property double $HR_Shaman
 * @property double $HR_Mage
 * @property double $HR_Warlock
 * @property double $HR_10
 * @property double $HR_Druid
 * @property double $MR_Warrior
 * @property double $MR_Paladin
 * @property double $MR_Hunter
 * @property double $MR_Rogue
 * @property double $MR_Priest
 * @property double $MR_DeathKnight
 * @property double $MR_Shaman
 * @property double $MR_Mage
 * @property double $MR_Warlock
 * @property double $MR_10
 * @property double $MR_Druid
 * @property double $CR_WEAPON_SKILL
 * @property double $CR_DEFENSE_SKILL
 * @property double $CR_DODGE
 * @property double $CR_PARRY
 * @property double $CR_BLOCK
 * @property double $CR_HIT_MELEE
 * @property double $CR_HIT_RANGED
 * @property double $CR_HIT_SPELL
 * @property double $CR_CRIT_MELEE
 * @property double $CR_CRIT_RANGED
 * @property double $CR_CRIT_SPELL
 * @property double $CR_HIT_TAKEN_MELEE
 * @property double $CR_HIT_TAKEN_RANGED
 * @property double $CR_HIT_TAKEN_SPELL
 * @property double $CR_CRIT_TAKEN_MELEE
 * @property double $CR_CRIT_TAKEN_RANGED
 * @property double $CR_CRIT_TAKEN_SPELL
 * @property double $CR_HASTE_MELEE
 * @property double $CR_HASTE_RANGED
 * @property double $CR_HASTE_SPELL
 * @property double $CR_WEAPON_SKILL_MAINHAND
 * @property double $CR_WEAPON_SKILL_OFFHAND
 * @property double $CR_WEAPON_SKILL_RANGED
 * @property double $CR_EXPERTISE
 * @property double $CR_ARMOR_PENETRATION
 */
class ArmoryRating extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'armory_rating';
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
            [['level', 'CR_EXPERTISE', 'CR_ARMOR_PENETRATION'], 'required'],
            [['level'], 'integer'],
            [['MC_Warrior', 'MC_Paladin', 'MC_Hunter', 'MC_Rogue', 'MC_Priest', 'MC_DeathKnight', 'MC_Shaman', 'MC_Mage', 'MC_Warlock', 'MC_10', 'MC_Druid', 'SC_Warrior', 'SC_Paladin', 'SC_Hunter', 'SC_Rogue', 'SC_Priest', 'SC_DeathKnight', 'SC_Shaman', 'SC_Mage', 'SC_Warlock', 'SC_10', 'SC_Druid', 'HR_Warrior', 'HR_Paladin', 'HR_Hunter', 'HR_Rogue', 'HR_Priest', 'HR_DeathKnight', 'HR_Shaman', 'HR_Mage', 'HR_Warlock', 'HR_10', 'HR_Druid', 'MR_Warrior', 'MR_Paladin', 'MR_Hunter', 'MR_Rogue', 'MR_Priest', 'MR_DeathKnight', 'MR_Shaman', 'MR_Mage', 'MR_Warlock', 'MR_10', 'MR_Druid', 'CR_WEAPON_SKILL', 'CR_DEFENSE_SKILL', 'CR_DODGE', 'CR_PARRY', 'CR_BLOCK', 'CR_HIT_MELEE', 'CR_HIT_RANGED', 'CR_HIT_SPELL', 'CR_CRIT_MELEE', 'CR_CRIT_RANGED', 'CR_CRIT_SPELL', 'CR_HIT_TAKEN_MELEE', 'CR_HIT_TAKEN_RANGED', 'CR_HIT_TAKEN_SPELL', 'CR_CRIT_TAKEN_MELEE', 'CR_CRIT_TAKEN_RANGED', 'CR_CRIT_TAKEN_SPELL', 'CR_HASTE_MELEE', 'CR_HASTE_RANGED', 'CR_HASTE_SPELL', 'CR_WEAPON_SKILL_MAINHAND', 'CR_WEAPON_SKILL_OFFHAND', 'CR_WEAPON_SKILL_RANGED', 'CR_EXPERTISE', 'CR_ARMOR_PENETRATION'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'level' => Yii::t('common', 'Level'),
            'MC_Warrior' => Yii::t('common', 'Mc  Warrior'),
            'MC_Paladin' => Yii::t('common', 'Mc  Paladin'),
            'MC_Hunter' => Yii::t('common', 'Mc  Hunter'),
            'MC_Rogue' => Yii::t('common', 'Mc  Rogue'),
            'MC_Priest' => Yii::t('common', 'Mc  Priest'),
            'MC_DeathKnight' => Yii::t('common', 'Mc  Death Knight'),
            'MC_Shaman' => Yii::t('common', 'Mc  Shaman'),
            'MC_Mage' => Yii::t('common', 'Mc  Mage'),
            'MC_Warlock' => Yii::t('common', 'Mc  Warlock'),
            'MC_10' => Yii::t('common', 'Mc 10'),
            'MC_Druid' => Yii::t('common', 'Mc  Druid'),
            'SC_Warrior' => Yii::t('common', 'Sc  Warrior'),
            'SC_Paladin' => Yii::t('common', 'Sc  Paladin'),
            'SC_Hunter' => Yii::t('common', 'Sc  Hunter'),
            'SC_Rogue' => Yii::t('common', 'Sc  Rogue'),
            'SC_Priest' => Yii::t('common', 'Sc  Priest'),
            'SC_DeathKnight' => Yii::t('common', 'Sc  Death Knight'),
            'SC_Shaman' => Yii::t('common', 'Sc  Shaman'),
            'SC_Mage' => Yii::t('common', 'Sc  Mage'),
            'SC_Warlock' => Yii::t('common', 'Sc  Warlock'),
            'SC_10' => Yii::t('common', 'Sc 10'),
            'SC_Druid' => Yii::t('common', 'Sc  Druid'),
            'HR_Warrior' => Yii::t('common', 'Hr  Warrior'),
            'HR_Paladin' => Yii::t('common', 'Hr  Paladin'),
            'HR_Hunter' => Yii::t('common', 'Hr  Hunter'),
            'HR_Rogue' => Yii::t('common', 'Hr  Rogue'),
            'HR_Priest' => Yii::t('common', 'Hr  Priest'),
            'HR_DeathKnight' => Yii::t('common', 'Hr  Death Knight'),
            'HR_Shaman' => Yii::t('common', 'Hr  Shaman'),
            'HR_Mage' => Yii::t('common', 'Hr  Mage'),
            'HR_Warlock' => Yii::t('common', 'Hr  Warlock'),
            'HR_10' => Yii::t('common', 'Hr 10'),
            'HR_Druid' => Yii::t('common', 'Hr  Druid'),
            'MR_Warrior' => Yii::t('common', 'Mr  Warrior'),
            'MR_Paladin' => Yii::t('common', 'Mr  Paladin'),
            'MR_Hunter' => Yii::t('common', 'Mr  Hunter'),
            'MR_Rogue' => Yii::t('common', 'Mr  Rogue'),
            'MR_Priest' => Yii::t('common', 'Mr  Priest'),
            'MR_DeathKnight' => Yii::t('common', 'Mr  Death Knight'),
            'MR_Shaman' => Yii::t('common', 'Mr  Shaman'),
            'MR_Mage' => Yii::t('common', 'Mr  Mage'),
            'MR_Warlock' => Yii::t('common', 'Mr  Warlock'),
            'MR_10' => Yii::t('common', 'Mr 10'),
            'MR_Druid' => Yii::t('common', 'Mr  Druid'),
            'CR_WEAPON_SKILL' => Yii::t('common', 'Cr  Weapon  Skill'),
            'CR_DEFENSE_SKILL' => Yii::t('common', 'Cr  Defense  Skill'),
            'CR_DODGE' => Yii::t('common', 'Cr  Dodge'),
            'CR_PARRY' => Yii::t('common', 'Cr  Parry'),
            'CR_BLOCK' => Yii::t('common', 'Cr  Block'),
            'CR_HIT_MELEE' => Yii::t('common', 'Cr  Hit  Melee'),
            'CR_HIT_RANGED' => Yii::t('common', 'Cr  Hit  Ranged'),
            'CR_HIT_SPELL' => Yii::t('common', 'Cr  Hit  Spell'),
            'CR_CRIT_MELEE' => Yii::t('common', 'Cr  Crit  Melee'),
            'CR_CRIT_RANGED' => Yii::t('common', 'Cr  Crit  Ranged'),
            'CR_CRIT_SPELL' => Yii::t('common', 'Cr  Crit  Spell'),
            'CR_HIT_TAKEN_MELEE' => Yii::t('common', 'Cr  Hit  Taken  Melee'),
            'CR_HIT_TAKEN_RANGED' => Yii::t('common', 'Cr  Hit  Taken  Ranged'),
            'CR_HIT_TAKEN_SPELL' => Yii::t('common', 'Cr  Hit  Taken  Spell'),
            'CR_CRIT_TAKEN_MELEE' => Yii::t('common', 'Cr  Crit  Taken  Melee'),
            'CR_CRIT_TAKEN_RANGED' => Yii::t('common', 'Cr  Crit  Taken  Ranged'),
            'CR_CRIT_TAKEN_SPELL' => Yii::t('common', 'Cr  Crit  Taken  Spell'),
            'CR_HASTE_MELEE' => Yii::t('common', 'Cr  Haste  Melee'),
            'CR_HASTE_RANGED' => Yii::t('common', 'Cr  Haste  Ranged'),
            'CR_HASTE_SPELL' => Yii::t('common', 'Cr  Haste  Spell'),
            'CR_WEAPON_SKILL_MAINHAND' => Yii::t('common', 'Cr  Weapon  Skill  Mainhand'),
            'CR_WEAPON_SKILL_OFFHAND' => Yii::t('common', 'Cr  Weapon  Skill  Offhand'),
            'CR_WEAPON_SKILL_RANGED' => Yii::t('common', 'Cr  Weapon  Skill  Ranged'),
            'CR_EXPERTISE' => Yii::t('common', 'Cr  Expertise'),
            'CR_ARMOR_PENETRATION' => Yii::t('common', 'Cr  Armor  Penetration'),
        ];
    }
}