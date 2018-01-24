<?php

namespace common\models\chars;

use Yii;

use common\core\models\characters\CoreModel;

/**
 * This is the model class for table "arena_team_member".
 *
 * @property integer $arenaTeamId
 * @property integer $guid
 * @property integer $weekGames
 * @property integer $weekWins
 * @property integer $seasonGames
 * @property integer $seasonWins
 * @property integer $personalRating
 */
class ArenaTeamMember extends CoreModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'arena_team_member';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['arenaTeamId', 'guid'], 'required'],
            [['arenaTeamId', 'guid', 'weekGames', 'weekWins', 'seasonGames', 'seasonWins', 'personalRating'], 'integer'],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'arenaTeamId' => Yii::t('app', 'Arena Team ID'),
            'guid' => Yii::t('app', 'Guid'),
            'weekGames' => Yii::t('app', 'Недельных игр'),
            'weekWins' => Yii::t('app', 'Недельных побед'),
            'seasonGames' => Yii::t('app', 'Игр в сезоне'),
            'seasonWins' => Yii::t('app', 'Побед в сезоне'),
            'personalRating' => Yii::t('app', 'личный рейтинг'),
        ];
    }
    /**
    * Связь для получения объекта содержащего данные о персонаже (участнике команды)
    * @return \yii\db\ActiveQuery
    */
    public function getRelationCharacter() {
        return $this->hasOne(Characters::className(), ['guid' => 'guid']);
    }
    /**
    * Связь для получения объекта содержащего данные о команде
    * @return \yii\db\ActiveQuery
    */
    public function getRelationTeam() {
        return $this->hasOne(ArenaTeam::className(),['arenaTeamId' => 'arenaTeamId']);
    }
    
}
