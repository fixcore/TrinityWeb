<?php

namespace common\models\auth\search;

use Yii;
use yii\data\ActiveDataProvider;

use common\models\auth\LogsIpActions;

/**
 * This is the model class for table "{{%logs_ip_actions}}".
 *
 * @property integer $id
 * @property integer $account_id
 * @property integer $character_guid
 * @property integer $type
 * @property string $ip
 * @property string $systemnote
 * @property integer $unixtime
 * @property string $time
 * @property string $comment
 */
class LogsIpActionsSearch extends LogsIpActions
{
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%logs_ip_actions}}';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('auth');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['account_id','type'], 'integer'],
        ];
    }

    public function search($params) {
        $query = LogsIpActions::find()->where(['account_id' => Yii::$app->user->getId()])->orderBy(['unixtime' => SORT_DESC]);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ]
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'type' => $this->type,
        ]);

        return $dataProvider;
    }
    
}
