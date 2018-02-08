<?php
/**
 * Eugine Terentev <eugine@terentev.net>
 */

namespace common\rbac\rule;

use yii\rbac\Item;
use yii\rbac\Rule;

use common\modules\forum\models\User;
use common\modules\forum\rbac\Rbac;

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
        
        if($user) {
            if(User::can(Rbac::PERM_CREATE_THREAD_IN_CLOSED_CATEGORY)) {
                return true;
            } else {
                if(isset($params['category']) && $params['category']->getAttribute($attribute)) {
                    return true;
                }
            }
        }
        
        return false;
        
    }
}
