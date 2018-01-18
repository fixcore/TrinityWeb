<?php

namespace common\models\chars;

use Yii;

use common\core\models\characters\CoreModel;

/**
 * This is the model class for table "character_spell".
 *
 * @property integer $guid
 * @property integer $spell
 * @property integer $active
 * @property integer $disabled
 */
class CharacterSpell extends CoreModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'character_spell';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guid', 'spell'], 'required'],
            [['guid', 'spell', 'active', 'disabled'], 'integer'],
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
            'active' => Yii::t('app', 'Active'),
            'disabled' => Yii::t('app', 'Disabled'),
        ];
    }
}
