<?php
/**
 * Eugine Terentev <eugine@terentev.net>
 */

namespace common\rbac\rule;

use yii\rbac\Item;
use yii\rbac\Rule;

use common\modules\forum\models\User;
use common\modules\forum\rbac\Rbac;

use yii\rbac\Role;

class createThreadInClosedCategory extends Rule
{
    /** @var string */
    public $name = 'createThreadInClosedCategory';

    /**
     * @param int $user
     * @param Item $item
     * @param array $params
     * - model: model to check owner
     * - attribute: attribute that will be compared to user ID
     * @return bool
     */
    public function execute($user, $item, $params)
    {
        $attribute = isset($params['attribute']) ? $params['attribute'] : 'create_thread';
        if(isset($user)) {
            if(User::can(Rbac::PERM_CREATE_THREAD_IN_CLOSED_CATEGORY)) {
                return true;
            } else {
                if(isset($params['category']) && $params['category']->getAttribute($attribute)) {
                    return true;
                } elseif($item instanceof Role && !isset($params['category'])) {
                    return true;
                }
            }
        }
        return false;
        
    }
}
