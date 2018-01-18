<?php

namespace common\models\chars;

use Yii;

use common\core\models\characters\CoreModel;

class CharacterHomebind extends CoreModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'character_homebind';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guid'], 'required'],
            [['guid', 'mapId', 'zoneId'], 'integer'],
            [['posX', 'posY', 'posZ'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'guid' => Yii::t('app', 'Guid'),
            'mapId' => Yii::t('app', 'Map ID'),
            'zoneId' => Yii::t('app', 'Zone ID'),
            'posX' => Yii::t('app', 'Pos X'),
            'posY' => Yii::t('app', 'Pos Y'),
            'posZ' => Yii::t('app', 'Pos Z'),
        ];
    }
}
