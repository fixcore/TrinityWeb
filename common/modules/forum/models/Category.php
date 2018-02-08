<?php

namespace common\modules\forum\models;

use common\modules\forum\db\Query;
use common\modules\forum\models\db\CategoryActiveRecord;
use common\modules\forum\Podium;
use common\modules\forum\services\Sorter;
use yii\data\ActiveDataProvider;

/**
 * Category model
 *
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.1
 */
class Category extends CategoryActiveRecord
{
    /**
     * Searches users.
     * @return ActiveDataProvider
     */
    public function search()
    {
        $query = static::find();
        if (Podium::getInstance()->user->isGuest) {
            $query->andWhere(['visible' => 1]);
        }
        $dataProvider = new ActiveDataProvider(['query' => $query]);
        $dataProvider->sort->defaultOrder = ['sort' => SORT_ASC, 'id' => SORT_ASC];
        return $dataProvider;
    }

    /**
     * Returns categories.
     * @return Category[]
     */
    public function show()
    {
        $dataProvider = new ActiveDataProvider(['query' => static::find()]);
        $dataProvider->sort->defaultOrder = ['sort' => SORT_ASC, 'id' => SORT_ASC];
        return $dataProvider->getModels();
    }

    /**
     * Sets new categories order.
     * @param int $order new category sorting order number
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
                            ->where(['!=', 'id', $this->id])
                            ->orderBy(['sort' => SORT_ASC, 'id' => SORT_ASC])
                            ->indexBy('id');
        return $sorter->run();
    }
}
