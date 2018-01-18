<?php

namespace common\models\chars;

use Yii;

use common\core\models\characters\CoreModel;

use common\models\armory\ArmoryProfessions;

/**
 * This is the model class for table "{{%character_skills}}".
 *
 * @property integer $guid
 * @property integer $skill
 * @property integer $value
 * @property integer $max
 */
class CharacterSkills extends CoreModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%character_skills}}';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guid', 'skill', 'value', 'max'], 'required'],
            [['guid', 'skill', 'value', 'max'], 'integer'],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'guid' => Yii::t('app', 'Guid'),
            'skill' => Yii::t('app', 'Skill'),
            'value' => Yii::t('app', 'Значение'),
            'max' => Yii::t('app', 'Максимальное значение'),
        ];
    }
    /**
    * Связь для получения объекта содержащего данные о профессии из БД Armory
    * @return \yii\db\ActiveQuery
    */
    public function getRelationArmoryProfession() {
        return $this->hasOne(ArmoryProfessions::className(),['id' => 'skill']);
    }
    
}
