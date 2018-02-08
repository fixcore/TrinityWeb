<?php

namespace common\modules\forum\db;

use common\modules\forum\Podium;
use yii\db\ActiveQuery;

/**
 * ActiveQuery extended for User
 *
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.1
 */
class UserQuery extends ActiveQuery
{
    /**
     * Adds proper user ID for query.
     * @param int $id
     */
    public function loggedUser($id)
    {
        if (Podium::getInstance()->userComponent !== true) {
            return $this->andWhere(['inherited_id' => $id]);
        }
        return $this->andWhere(['id' => $id]);
    }
}
