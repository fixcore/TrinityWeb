<?php

namespace common\modules\forum\models\db;

use common\modules\forum\db\ActiveRecord;
use common\modules\forum\models\Category;
use common\modules\forum\models\Post;
use common\modules\forum\Podium;
use common\modules\forum\slugs\PodiumSluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\HtmlPurifier;

/**
 * Forum AR
 *
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.6
 *
 * @property integer $id
 * @property integer $root
 * @property integer $lvl
 * @property integer $lft
 * @property integer $rgt
 * @property integer $category_id
 * @property string $name
 * @property string $sub
 * @property string $icon
 * @property integer $icon_type
 * @property string $slug
 * @property string $keywords
 * @property string $description
 * @property integer $visible
 * @property integer $updated_at
 * @property integer $created_at
 */
class ForumActiveRecord extends \kartik\tree\models\Tree
{   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%forum_forum}}';
    }
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return array_merge(parent::behaviors(),[
            TimestampBehavior::className(),
            [
                'class' => Podium::getInstance()->slugGenerator,
                'attribute' => 'name',
                'type' => PodiumSluggableBehavior::FORUM
            ]
        ]);
    }
    
    public function __construct($config = array()) {
        parent::__construct($config);
        $this->icon_type = 2;
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(),[
            [['name', 'visible'], 'required'],
            ['visible', 'boolean'],
            [['name', 'sub'], 'filter', 'filter' => function ($value) {
                return HtmlPurifier::process(trim($value));
            }],
            [['keywords', 'description'], 'string'],
            [['category_id'],'safe'],
        ]);
    }

    /**
     * Category relation.
     * @return ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * Post relation. One latest post.
     * @return ActiveQuery
     */
    public function getLatest()
    {
        return $this->hasOne(Post::className(), ['forum_id' => 'id'])->orderBy(['id' => SORT_DESC]);
    }
    
    /**
     * Post relation. One latest post.
     * @return ActiveQuery
     */
    public function findLatestPost() {
        $forum_ids = [$this->id];
        $childs = $this->children()->all();
        foreach($childs as $child) {
            $forum_ids[] = $child->id;
        }
        return Post::find()->where(['forum_id' => $forum_ids])->orderBy(['id' => SORT_DESC])->one();
    }
    
    /**
     * Parent relation.
     * @return ActiveQuery
     */
    public function getParent() {
        return $this->hasOne(ForumActiveRecord::className(), ['id' => 'root'])->andWhere(['lvl' => (($this->lvl - 1) >= 0 ? 0 : ($this->lvl - 1))]);
    }

}
