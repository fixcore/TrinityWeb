<?php

namespace common\models\chars;

use Yii;

use common\core\models\characters\CoreModel;

/**
 * This is the model class for table "character_social".
 *
 * @property integer $guid
 * @property integer $friend
 * @property integer $flags
 * @property string $note
 */
class CharacterSocial extends CoreModel
{
    
    const FRIENDS = 1;
    const BLOCKED = 2;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'character_social';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guid', 'friend', 'flags'], 'required'],
            [['guid', 'friend', 'flags'], 'integer'],
            [['note'], 'string', 'max' => 48],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'guid' => Yii::t('app', 'Guid'),
            'friend' => Yii::t('app', 'Friend'),
            'flags' => Yii::t('app', 'Flags'),
            'note' => Yii::t('app', 'Note'),
        ];
    }
    /**
    * Связь для получения объекта содержащего данные о основном персонаже
    * @return \yii\db\ActiveQuery
    */
    public function getRelationOwnerCharacter() {
        return $this->hasOne(Characters::className(),['guid' => 'guid']);
    }
    /**
    * Связь для получения объекта содержащего данные о *друге*
    * @return \yii\db\ActiveQuery
    */
    public function getRelationFriendCharacter() {
        return $this->hasOne(Characters::className(),['guid' => 'friend']);
    }
    
}
