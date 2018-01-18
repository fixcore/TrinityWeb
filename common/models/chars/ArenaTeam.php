<?php

namespace common\models\chars;

use Yii;
use yii\helpers\Url;

use common\core\models\characters\CoreModel;

/**
 * This is the model class for table "arena_team".
 *
 * @property integer $arenaTeamId
 * @property string $name
 * @property integer $captainGuid
 * @property integer $type
 * @property integer $rating
 * @property integer $seasonGames
 * @property integer $seasonWins
 * @property integer $weekGames
 * @property integer $weekWins
 * @property integer $rank
 * @property integer $backgroundColor
 * @property integer $emblemStyle
 * @property integer $emblemColor
 * @property integer $borderStyle
 * @property integer $borderColor
 */
class ArenaTeam extends CoreModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'arena_team';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['arenaTeamId', 'name'], 'required'],
            [['arenaTeamId', 'captainGuid', 'type', 'rating', 'seasonGames', 'seasonWins', 'weekGames', 'weekWins', 'rank', 'backgroundColor', 'emblemStyle', 'emblemColor', 'borderStyle', 'borderColor'], 'integer'],
            [['name'], 'string', 'max' => 24],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'arenaTeamId' => Yii::t('app', 'Arena Team ID'),
            'name' => Yii::t('app', 'Название'),
            'captainGuid' => Yii::t('app', 'Captain Guid'),
            'type' => Yii::t('app', 'Тип'),
            'rating' => Yii::t('app', 'Рейтинг'),
            'seasonGames' => Yii::t('app', 'Игр в сезоне'),
            'seasonWins' => Yii::t('app', 'Побед в сезоне'),
            'weekGames' => Yii::t('app', 'Недельных игр'),
            'weekWins' => Yii::t('app', 'Недельных побед'),
            'rank' => Yii::t('app', 'Ранг'),
            'backgroundColor' => Yii::t('app', 'Background Color'),
            'emblemStyle' => Yii::t('app', 'Emblem Style'),
            'emblemColor' => Yii::t('app', 'Emblem Color'),
            'borderStyle' => Yii::t('app', 'Border Style'),
            'borderColor' => Yii::t('app', 'Border Color'),
        ];
    }
    /**
    * Функция для получения относительной ссылки на просмотр команды
    * @return \yii\db\ActiveQuery
    */
    public function getUrl($server_id) {
        return Url::to(['/ladder/team', 'id' => $this->arenaTeamId, 'server' => Yii::$app->CharactersDbHelper->getServerNameById($server_id)]);
    }
    /**
    * Связь для получения объектов содержащих данные о участниках команды
    * @return \yii\db\ActiveQuery
    */
    public function getRelationMembers() {
        return $this->hasMany(ArenaTeamMember::className(), ['arenaTeamId' => 'arenaTeamId']);
    }
}
