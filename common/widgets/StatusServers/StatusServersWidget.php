<?php
namespace common\widgets\StatusServers;

use Yii;
use yii\base\Widget;
use common\models\auth\Accounts;
use common\models\chars\Characters;

class StatusServersWidget extends Widget
{
    
    const UPDATE_TIME = 120;
    
    public function run() {
        $servers = Yii::$app->CharactersDbHelper->getServers();
        $shared_online = 0;
        $status_data = Yii::$app->cache->get('widget-status_servers');
        if($status_data === false) {
            foreach($servers as $server) {
                $status_list[$server['name']]['id'] = $server['id'];
                if (!$world = @fsockopen($server['address'],$server['port'],$errno,$errstr,1)) {//timeout 1 second
                    $status_list[$server['name']]['status'] = Yii::$app->AppHelper::$OFFLINE;
                    $status_list[$server['name']]['online_list'] = [];
                    Yii::$app->CharactersDbHelper::clearOnlineCache($server['id']);
                } else {
                    $status_list[$server['name']]['status'] = Yii::$app->AppHelper::$ONLINE;
                    $status_list[$server['name']]['online_list'] = Characters::getOnlineByServer($server['id'], self::UPDATE_TIME);
                    $shared_online += count($status_list[$server['name']]['online_list']);
                    fclose($world);
                }
            }
            $status_data['status_list'] = $status_list;
            $status_data['shared_online'] = $shared_online;
            Yii::$app->cache->set('widget-status_servers',$status_data,self::UPDATE_TIME);
        }
        return $this->render('index', [
            'status_list' => $status_data['status_list'],
            'shared_online' => $status_data['shared_online'],
        ]);
    }
}