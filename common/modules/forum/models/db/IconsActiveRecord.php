<?php

namespace common\modules\forum\models\db;

use Yii;
use common\modules\forum\db\ActiveRecord;
use yii\db\ActiveQuery;
use trntv\filekit\behaviors\UploadBehavior;
use yii\data\ActiveDataProvider;

use common\modules\forum\models\db\ForumActiveRecord;

/**
 * Activity AR.
 *
 * @property integer $id
 * @property integer $icon_type
 * @property string $icon
 * @property string $icon_string
 * @property string $icon_path
 * @property string $icon_base_url
 */
class IconsActiveRecord extends ActiveRecord
{
    
    const TYPE_FONT = 1;
    const TYPE_IMAGE = 2;
    
    /**
     * @var
     */
    public $picture;
    
    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'picture' => [
                'class' => UploadBehavior::className(),
                'attribute' => 'picture',
                'pathAttribute' => 'icon_path',
                'baseUrlAttribute' => 'icon_base_url'
            ]
        ];
    }
    
    public function beforeSave($insert) {
        $old_value = null;
        $new_value = null;
        if($this->icon_type == IconsActiveRecord::TYPE_FONT) {
            $old_value = '<i class="' . $this->getOldAttribute('icon_string') . '"></i>';
            $new_value = '<i class="' . $this->icon_string . '"></i>';
        } else {
            $old_value = '<img style="max-width: 32px;" src="' . $this->getOldAttribute('icon_base_url') . '/' . $this->getOldAttribute('icon_path') . '"/>';
            $new_value = '<img style="max-width: 32px;" src="' . $this->icon_base_url . '/' . $this->icon_path . '"/>';
        }
        
        if($old_value && $new_value && ($old_value != $new_value)) {
            ForumActiveRecord::updateAll(['icon' => $new_value], ['icon' => $old_value]);
        }
        
        return parent::beforeSave($insert);
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['icon', 'string'],
            [['icon_type'], 'integer'],
            [['icon_path', 'icon_base_url','icon_string'], 'string', 'max' => 255],
            ['picture', 'safe']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%forum_icons}}';
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'icon' => Yii::t('common', 'Иконка'),
            'icon_type' => Yii::t('common', 'Тип иконки'),
            'icon_string' => Yii::t('common', 'Значение иконки'),
        ];
    }
    
    public static function getTypes() {
        return [
            1 => Yii::t('common','Иконка'),
            2 => Yii::t('common','Изображение')
        ];
    }
    
    public function search($params) {
        $query = IconsActiveRecord::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'icon_type' => $this->icon_type,
        ]);

        $query->andFilterWhere(['like', 'icon', $this->icon]);
        $query->andFilterWhere(['like', 'icon_string', $this->icon_string]);
        return $dataProvider;
    }
    
    public function buildImageUrl() {
        return $this->icon_base_url . '/' . $this->icon_path;
    }
    
    public function getDataArray() {
        $icons = IconsActiveRecord::find()->all();
        $data = [];
        foreach($icons as $icon) {
            if($icon->icon_type == IconsActiveRecord::TYPE_FONT) {
                $data['<i class="' . $icon->icon_string . '"></i>'] = '<i class="' . $icon->icon_string . '"></i>';
            } else {
                $data['<img style="max-width: 32px;" src="' . $icon->icon_base_url . '/' . $icon->icon_path . '"/>'] = '<img style="max-width: 32px;" src="' . $icon->icon_base_url . '/' . $icon->icon_path . '"/>';
            }
        }
        return $data;
    }
    
}