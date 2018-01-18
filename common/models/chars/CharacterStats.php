<?php

namespace common\models\chars;

use Yii;

use common\core\models\characters\CoreModel;

/**
 * This is the model class for table "character_stats".
 *
 * @property integer $guid
 * @property integer $maxhealth
 * @property integer $maxpower1
 * @property integer $maxpower2
 * @property integer $maxpower3
 * @property integer $maxpower4
 * @property integer $maxpower5
 * @property integer $maxpower6
 * @property integer $maxpower7
 * @property integer $strength
 * @property integer $agility
 * @property integer $stamina
 * @property integer $intellect
 * @property integer $spirit
 * @property integer $armor
 * @property integer $resHoly
 * @property integer $resFire
 * @property integer $resNature
 * @property integer $resFrost
 * @property integer $resShadow
 * @property integer $resArcane
 * @property double $blockPct
 * @property double $dodgePct
 * @property double $parryPct
 * @property double $critPct
 * @property double $rangedCritPct
 * @property double $spellCritPct
 * @property integer $attackPower
 * @property integer $rangedAttackPower
 * @property integer $spellPower
 * @property integer $resilience
 */
class CharacterStats extends CoreModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'character_stats';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guid'], 'required'],
            [['guid', 'maxhealth', 'maxpower1', 'maxpower2', 'maxpower3', 'maxpower4', 'maxpower5', 'maxpower6', 'maxpower7', 'strength', 'agility', 'stamina', 'intellect', 'spirit', 'armor', 'resHoly', 'resFire', 'resNature', 'resFrost', 'resShadow', 'resArcane', 'attackPower', 'rangedAttackPower', 'spellPower', 'resilience', 'achievementPoints'], 'integer'],
            [['blockPct', 'dodgePct', 'parryPct', 'critPct', 'rangedCritPct', 'spellCritPct'], 'number'],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'guid' => Yii::t('app', 'Guid'),
            'maxhealth' => Yii::t('app', 'Maxhealth'),
            'maxpower1' => Yii::t('app', 'Maxpower1'),
            'maxpower2' => Yii::t('app', 'Maxpower2'),
            'maxpower3' => Yii::t('app', 'Maxpower3'),
            'maxpower4' => Yii::t('app', 'Maxpower4'),
            'maxpower5' => Yii::t('app', 'Maxpower5'),
            'maxpower6' => Yii::t('app', 'Maxpower6'),
            'maxpower7' => Yii::t('app', 'Maxpower7'),
            'strength' => Yii::t('app', 'Strength'),
            'agility' => Yii::t('app', 'Agility'),
            'stamina' => Yii::t('app', 'Stamina'),
            'intellect' => Yii::t('app', 'Intellect'),
            'spirit' => Yii::t('app', 'Spirit'),
            'armor' => Yii::t('app', 'Armor'),
            'resHoly' => Yii::t('app', 'Res Holy'),
            'resFire' => Yii::t('app', 'Res Fire'),
            'resNature' => Yii::t('app', 'Res Nature'),
            'resFrost' => Yii::t('app', 'Res Frost'),
            'resShadow' => Yii::t('app', 'Res Shadow'),
            'resArcane' => Yii::t('app', 'Res Arcane'),
            'blockPct' => Yii::t('app', 'Block Pct'),
            'dodgePct' => Yii::t('app', 'Dodge Pct'),
            'parryPct' => Yii::t('app', 'Parry Pct'),
            'critPct' => Yii::t('app', 'Crit Pct'),
            'rangedCritPct' => Yii::t('app', 'Ranged Crit Pct'),
            'spellCritPct' => Yii::t('app', 'Spell Crit Pct'),
            'attackPower' => Yii::t('app', 'Attack Power'),
            'rangedAttackPower' => Yii::t('app', 'Ranged Attack Power'),
            'spellPower' => Yii::t('app', 'Spell Power'),
            'resilience' => Yii::t('app', 'Resilience'),
            'achievementPoints' => Yii::t('app', 'Achievement Points'),
        ];
    }
}
