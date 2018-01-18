<?php

namespace common\models\chars;

use Yii;

use common\core\models\characters\CoreModel;

/**
 * This is the model class for table "character_talent".
 *
 * @property integer $guid
 * @property integer $spell
 * @property integer $talentGroup
 */
class CharacterTalent extends CoreModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'character_talent';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guid', 'spell', 'talentGroup'], 'required'],
            [['guid', 'spell', 'talentGroup'], 'integer'],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'guid' => Yii::t('app', 'Guid'),
            'spell' => Yii::t('app', 'Spell'),
            'talentGroup' => Yii::t('app', 'Talent Group'),
        ];
    }
}