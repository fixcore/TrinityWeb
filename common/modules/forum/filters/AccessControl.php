<?php

namespace common\modules\forum\filters;

use common\modules\forum\Podium;
use yii\filters\AccessControl as YiiAccessControl;

/**
 * Podium access control filter
 *
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.6
 */
class AccessControl extends YiiAccessControl
{
    /**
     * @var array the default configuration of access rules. Individual rule
     * configurations specified via rules will take precedence when the same
     * property of the rule is configured.
     */
    public $ruleConfig = ['class' => 'common\modules\forum\filters\PodiumRoleRule'];

    /**
     * Sets Podium user component.
     */
    public function init()
    {
        $this->user = Podium::getInstance()->user;
        parent::init();
    }
}
