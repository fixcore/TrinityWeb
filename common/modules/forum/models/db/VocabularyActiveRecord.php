<?php

namespace common\modules\forum\models\db;

use common\modules\forum\db\ActiveRecord;
use common\modules\forum\models\Post;
use common\modules\forum\models\Thread;
use yii\db\ActiveQuery;
use yii\helpers\HtmlPurifier;

/**
 * Vocabulary AR
 *
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.6
 */
class VocabularyActiveRecord extends ActiveRecord
{
    /**
     * @var string Query
     */
    public $query;

    /**
     * @var int
     */
    public $thread_id;

    /**
     * @var int
     */
    public $post_id;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%forum_vocabulary}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['query', 'string'],
            ['query', 'filter', 'filter' => function ($value) {
                return HtmlPurifier::process(trim($value));
            }],
        ];
    }

    /**
     * Thread relation.
     * @return ActiveQuery
     */
    public function getThread()
    {
        return $this->hasOne(Thread::className(), ['id' => 'thread_id']);
    }

    /**
     * Post relation.
     * @return ActiveQuery
     */
    public function getPostData()
    {
        return $this->hasOne(Post::className(), ['id' => 'post_id']);
    }

    /**
     * Posts relation via junction.
     * @return ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['id' => 'post_id'])->viaTable('{{%forum_vocabulary_junction}}', ['word_id' => 'id']);
    }
}
