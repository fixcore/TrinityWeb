<?php

namespace common\modules\forum\models;

use common\modules\forum\db\Query;
use common\modules\forum\models\db\ForumActiveRecord;
use common\modules\forum\Podium;
use common\modules\forum\services\Sorter;
use yii\data\ActiveDataProvider;

/**
 * Forum model
 *
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.1
 */
class Forum extends ForumActiveRecord
{
    /**
     * Returns list of moderators for this forum.
     * @return int[]
     */
    public function getMods()
    {
        $mods = Podium::getInstance()->podiumCache->getElement('forum.moderators', $this->id);
        if ($mods === false) {
            $mods = [];
            $modteam = User::find()->select(['id', 'role'])->where([
                    'status' => User::STATUS_ACTIVE,
                    'role' => [User::ROLE_ADMIN, User::ROLE_MODERATOR]
                ]);
            foreach ($modteam->each() as $user) {
                if ($user->role == User::ROLE_ADMIN) {
                    $mods[] = $user->id;
                    continue;
                }
                if ((new Query())->from(Mod::tableName())->where([
                        'forum_id' => $this->id, 'user_id' => $user->id
                    ])->exists()) {
                    $mods[] = $user->id;
                }
            }
            Podium::getInstance()->podiumCache->setElement('forum.moderators', $this->id, $mods);
        }
        return $mods;
    }

    /**
     * Checks if user is moderator for this forum.
     * @param int|null $userId user ID or null for current signed in.
     * @return bool
     */
    public function isMod($userId = null)
    {
        if (in_array($userId ?: User::loggedId(), $this->getMods())) {
            return true;
        }
        return false;
    }

    /**
     * Searches forums.
     * @param int|null $categoryId
     * @return ActiveDataProvider
     */
    public function search($categoryId = null, $onlyVisible = false, $onlyRoots = true)
    {
        $query = static::find();
        
        if($onlyRoots) {
            $query->roots();
        }
        
        if ($categoryId) {
            $query->andWhere(['category_id' => $categoryId]);
        }
        if ($onlyVisible) {
            $query->joinWith(['category' => function ($query) {
                $query->andWhere([Category::tableName() . '.visible' => 1]);
            }]);
            $query->andWhere([static::tableName() . '.visible' => 1]);
            $query->andWhere([static::tableName() . '.active' => 1]);
        }
        $dataProvider = new ActiveDataProvider(['query' => $query]);
        $dataProvider->sort->defaultOrder = ['lft' => SORT_ASC];
        return $dataProvider;
    }

    /**
     * Returns the verified forum.
     * @param int $categoryId forum category ID
     * @param int $id forum ID
     * @param string $slug forum slug
     * @param bool $guest whether caller is guest or registered user
     * @return Forum
     * @since 0.2
     */
    public static function verify($categoryId = null, $id = null, $slug = null, $guest = true)
    {
        if (!is_numeric($categoryId) || $categoryId < 1 || !is_numeric($id) || $id < 1 || empty($slug)) {
            return null;
        }
        return static::find()->joinWith(['category' => function ($query) use ($guest) {
                if ($guest) {
                    $query->andWhere([Category::tableName() . '.visible' => 1]);
                }
            }])->where([
                static::tableName() . '.id' => $id,
                static::tableName() . '.slug' => $slug,
                static::tableName() . '.category_id' => $categoryId,
            ])->limit(1)->one();
    }

    /**
     * Sets new forums order.
     * @param int $order new forum sorting order number
     * @return bool
     * @since 0.2
     */
    public function newOrder($order)
    {
        $sorter = new Sorter();
        $sorter->target = $this;
        $sorter->order = $order;
        $sorter->query = (new Query())
                            ->from(static::tableName())
                            ->where(['and',
                                ['!=', 'id', $this->id],
                                ['category_id' => $this->category_id]
                            ])
                            ->orderBy(['id' => SORT_ASC])
                            ->indexBy('id');
        return $sorter->run();
    }

    /**
     * Searches forums.
     * @param int|null $parent_id
     * @return ActiveDataProvider
     */
    public function search_child($parent_id = null, $onlyVisible = false)
    {
        $query = static::find()->where(['root' => $parent_id, 'lvl' => $this->lvl + 1]);
        if ($onlyVisible) {
            $query->joinWith(['category' => function ($query) {
                $query->andWhere([Category::tableName() . '.visible' => 1]);
            }]);
            $query->andWhere([static::tableName() . '.visible' => 1]);
        }

        $dataProvider = new ActiveDataProvider(['query' => $query]);
        $dataProvider->sort->defaultOrder = ['lft' => SORT_ASC];
        return $dataProvider;
    }

}
