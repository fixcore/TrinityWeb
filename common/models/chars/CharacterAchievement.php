<?php

namespace common\models\chars;

use Yii;

use common\core\models\characters\CoreModel;

/**
 * This is the model class for table "character_achievement".
 *
 * @property integer $guid
 * @property integer $achievement
 * @property integer $date
 */
class CharacterAchievement extends CoreModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'character_achievement';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guid', 'achievement'], 'required'],
            [['guid', 'achievement', 'date'], 'integer'],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'guid' => Yii::t('app', 'Guid'),
            'achievement' => Yii::t('app', 'Achievement'),
            'date' => Yii::t('app', 'Date'),
        ];
    }
    /**
    * Связь для получения объекта содержащего данные о участниках команды
    * @return \yii\db\ActiveQuery
    */
    public function getAchievementRelation() {
        return $this->hasOne(ArmoryAchievement::className(), ['id' => 'achievement']);
    }

}
