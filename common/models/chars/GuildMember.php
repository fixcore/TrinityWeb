<?php

namespace common\models\chars;

use Yii;

use common\core\models\characters\CoreModel;

/**
 * This is the model class for table "guild_member".
 *
 * @property integer $guildid
 * @property integer $guid
 * @property integer $rank
 * @property string $pnote
 * @property string $offnote
 */
class GuildMember extends CoreModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'guild_member';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guildid', 'guid', 'rank'], 'required'],
            [['guildid', 'guid', 'rank'], 'integer'],
            [['pnote', 'offnote'], 'string', 'max' => 31],
            [['guid'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'guildid' => Yii::t('app', 'Guildid'),
            'guid' => Yii::t('app', 'Guid'),
            'rank' => Yii::t('app', 'Rank'),
            'pnote' => Yii::t('app', 'Pnote'),
            'offnote' => Yii::t('app', 'Offnote'),
        ];
    }

    public function getRelationGuild() {
        return $this->hasOne(Guild::className(),['guildid' => 'guildid']);
    }

}
