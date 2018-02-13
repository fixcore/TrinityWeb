<?php

namespace common\modules\forum\widgets;

use common\modules\forum\helpers\Helper;
use common\modules\forum\models\User;
use cebe\gravatar\Gravatar;
use Yii;
use yii\base\Widget;
use yii\helpers\Html;

/**
 * Podium Avatar widget
 * Renders user avatar image for each post.
 *
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.1
 */
class Avatar extends Widget
{
    /**
     * @var User|null Avatar owner.
     */
    public $author;

    /**
     * @var bool Whether user name should appear underneath the image.
     */
    public $showName = true;

    /**
     * Renders the image.
     * Based on user settings the avatar can be uploaded image, Gravatar image or default one.
     * @return string
     */
    public function run()
    {
        $avatar = Html::img(Helper::defaultAvatar(), [
            'class' => 'podium-avatar img-responsive center-block',
            'alt' => Yii::t('podium/view', 'user deleted')
        ]);
        $name = Helper::deletedUserTag(true);
        if ($this->author instanceof User) {
            $avatar = Html::img(Helper::defaultAvatar(), [
                'class' => 'podium-avatar img-responsive center-block',
                'alt'   => Html::encode($this->author->podiumName)
            ]);
            $name = $this->author->podiumTag;
            $meta = $this->author->findGeneralAccount();
            if (!empty($meta)) {
                $avatar = $meta->userProfile->getAvatar('img/default-profile.jpg');
                if (!empty($avatar)) {
                    $avatar = Html::img($avatar, [
                        'class' => 'podium-avatar img-responsive center-block',
                        'alt'   => Html::encode($this->author->podiumName)
                    ]);
                }
            }
        }
        return $avatar . ($this->showName ? Html::tag('p', $name, ['class' => 'avatar-name']) : '');
    }
}
