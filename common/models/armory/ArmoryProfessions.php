<?php

namespace common\models\armory;

use Yii;

/**
 * This is the model class for table "armory_professions".
 *
 * @property integer $id
 * @property string $name_de_de
 * @property string $name_zh_cn
 * @property string $name_en_gb
 * @property string $name_es_es
 * @property string $name_fr_fr
 * @property string $name_ru_ru
 * @property string $icon
 */
class ArmoryProfessions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'armory_professions';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('armory_db');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name_de_de', 'name_zh_cn', 'name_en_gb', 'name_es_es', 'name_fr_fr', 'name_ru_ru', 'icon'], 'required'],
            [['id'], 'integer'],
            [['name_de_de', 'name_zh_cn', 'name_en_gb', 'name_es_es', 'name_fr_fr', 'name_ru_ru'], 'string'],
            [['icon'], 'string', 'max' => 50],
            [['id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'name_de_de' => Yii::t('common', 'Name De De'),
            'name_zh_cn' => Yii::t('common', 'Name Zh Cn'),
            'name_en_gb' => Yii::t('common', 'Name En Gb'),
            'name_es_es' => Yii::t('common', 'Name Es Es'),
            'name_fr_fr' => Yii::t('common', 'Name Fr Fr'),
            'name_ru_ru' => Yii::t('common', 'Name Ru Ru'),
            'icon' => Yii::t('common', 'Icon'),
        ];
    }
    
    public function getProfessionData($id) {
        if($id) {
            return ArmoryProfessions::getData($id);
        }
        return null;
    }
    
    protected function getList() {
        $data = Yii::$app->cache->get(ArmoryProfessions::className());
        if($data === false) {
            $data = ArmoryProfessions::find()->asArray()->all();
            Yii::$app->cache->set(ArmoryProfessions::className(),$data);
        }
        return $data;
    }
    
    protected function getData($id) {
        
        $list = ArmoryProfessions::getList();
        foreach($list as $data_item) {
            if($data_item['id'] == $id) {
                return $data_item;
            }
        }
        return null;
    }
    
}