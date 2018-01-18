<?php

namespace common\models\chars;

use Yii;

use common\core\models\characters\CoreModel;

/**
 * This is the model class for table "character_glyphs".
 *
 * @property integer $guid
 * @property integer $talentGroup
 * @property integer $glyph1
 * @property integer $glyph2
 * @property integer $glyph3
 * @property integer $glyph4
 * @property integer $glyph5
 * @property integer $glyph6
 */
class CharacterGlyphs extends CoreModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'character_glyphs';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guid', 'talentGroup'], 'required'],
            [['guid', 'talentGroup', 'glyph1', 'glyph2', 'glyph3', 'glyph4', 'glyph5', 'glyph6'], 'integer'],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'guid' => Yii::t('app', 'Guid'),
            'talentGroup' => Yii::t('app', 'Talent Group'),
            'glyph1' => Yii::t('app', 'Glyph1'),
            'glyph2' => Yii::t('app', 'Glyph2'),
            'glyph3' => Yii::t('app', 'Glyph3'),
            'glyph4' => Yii::t('app', 'Glyph4'),
            'glyph5' => Yii::t('app', 'Glyph5'),
            'glyph6' => Yii::t('app', 'Glyph6'),
        ];
    }
    /**
    * Связь для получения объекта содержащего данные о символе в ячейке 1
    * @return \yii\db\ActiveQuery
    */
    public function getRelationGlyph1() {
        return $this->hasOne(ArmoryGlyphproperties::className(),['id' => 'glyph1']);
    }
    /**
    * Связь для получения объекта содержащего данные о символе в ячейке 2
    * @return \yii\db\ActiveQuery
    */
    public function getRelationGlyph2() {
        return $this->hasOne(ArmoryGlyphproperties::className(),['id' => 'glyph2']);
    }
    /**
    * Связь для получения объекта содержащего данные о символе в ячейке 3
    * @return \yii\db\ActiveQuery
    */
    public function getRelationGlyph3() {
        return $this->hasOne(ArmoryGlyphproperties::className(),['id' => 'glyph3']);
    }
    /**
    * Связь для получения объекта содержащего данные о символе в ячейке 4
    * @return \yii\db\ActiveQuery
    */
    public function getRelationGlyph4() {
        return $this->hasOne(ArmoryGlyphproperties::className(),['id' => 'glyph4']);
    }
    /**
    * Связь для получения объекта содержащего данные о символе в ячейке 5
    * @return \yii\db\ActiveQuery
    */
    public function getRelationGlyph5() {
        return $this->hasOne(ArmoryGlyphproperties::className(),['id' => 'glyph5']);
    }
    /**
    * Связь для получения объекта содержащего данные о символе в ячейке 6
    * @return \yii\db\ActiveQuery
    */
    public function getRelationGlyph6() {
        return $this->hasOne(ArmoryGlyphproperties::className(),['id' => 'glyph6']);
    }

}
