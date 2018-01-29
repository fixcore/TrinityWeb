<?php

namespace common\models\armory;

use Yii;

/**
 * This is the model class for table "armory_titles".
 *
 * @property integer $id
 * @property string $title_M_de_de
 * @property string $title_M_zh_cn
 * @property string $title_M_en_gb
 * @property string $title_M_es_es
 * @property string $title_M_fr_fr
 * @property string $title_M_ru_ru
 * @property string $title_F_de_de
 * @property string $title_F_zh_cn
 * @property string $title_F_en_gb
 * @property string $title_F_es_es
 * @property string $title_F_fr_fr
 * @property string $title_F_ru_ru
 * @property string $place
 */
class ArmoryTitles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'armory_titles';
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
            [['id', 'title_M_de_de', 'title_M_zh_cn', 'title_M_en_gb', 'title_M_es_es', 'title_M_fr_fr', 'title_M_ru_ru', 'title_F_de_de', 'title_F_zh_cn', 'title_F_en_gb', 'title_F_es_es', 'title_F_fr_fr', 'title_F_ru_ru', 'place'], 'required'],
            [['id'], 'integer'],
            [['title_M_de_de', 'title_M_zh_cn', 'title_M_en_gb', 'title_M_es_es', 'title_M_fr_fr', 'title_M_ru_ru', 'title_F_de_de', 'title_F_zh_cn', 'title_F_en_gb', 'title_F_es_es', 'title_F_fr_fr', 'title_F_ru_ru'], 'string'],
            [['place'], 'string', 'max' => 6],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'title_M_de_de' => Yii::t('common', 'Title  M De De'),
            'title_M_zh_cn' => Yii::t('common', 'Title  M Zh Cn'),
            'title_M_en_gb' => Yii::t('common', 'Title  M En Gb'),
            'title_M_es_es' => Yii::t('common', 'Title  M Es Es'),
            'title_M_fr_fr' => Yii::t('common', 'Title  M Fr Fr'),
            'title_M_ru_ru' => Yii::t('common', 'Title  M Ru Ru'),
            'title_F_de_de' => Yii::t('common', 'Title  F De De'),
            'title_F_zh_cn' => Yii::t('common', 'Title  F Zh Cn'),
            'title_F_en_gb' => Yii::t('common', 'Title  F En Gb'),
            'title_F_es_es' => Yii::t('common', 'Title  F Es Es'),
            'title_F_fr_fr' => Yii::t('common', 'Title  F Fr Fr'),
            'title_F_ru_ru' => Yii::t('common', 'Title  F Ru Ru'),
            'place' => Yii::t('common', 'Place'),
        ];
    }
}