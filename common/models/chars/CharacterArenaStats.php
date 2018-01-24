<?php

namespace common\models\chars;

use Yii;

use common\core\models\characters\CoreModel;

/**
 * This is the model class for table "character_arena_stats".
 *
 * @property integer $guid
 * @property integer $slot
 * @property integer $matchMakerRating
 */
class CharacterArenaStats extends CoreModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'character_arena_stats';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guid', 'slot'], 'required'],
            [['guid', 'slot', 'matchMakerRating'], 'integer'],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'guid' => Yii::t('app', 'Guid'),
            'slot' => Yii::t('app', 'Slot'),
            'matchMakerRating' => Yii::t('app', 'ММР'),
        ];
    }
}
