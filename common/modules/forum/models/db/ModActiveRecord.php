<?php

namespace common\modules\forum\models\db;

use common\modules\forum\db\ActiveRecord;
use yii\db\ActiveQuery;

/**
 * Mod AR
 *
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.6
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $forum_id
 */
class ModActiveRecord extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%forum_moderator}}';
    }

    /**
     * Forum relation.
     * @return ActiveQuery
     */
    public function getForum()
    {
        return $this->hasOne(static::className(), ['id' => 'forum_id']);
    }
}
