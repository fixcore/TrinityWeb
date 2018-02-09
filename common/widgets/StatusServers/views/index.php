<div class="panel panel-default widget" id="widget-status_servers">
    <div class="panel-heading">
        <?=Yii::t('app','Всего: {count}', [
            'count' => $shared_online,
        ])?>
  </div>
  <div class="panel-body">
      <?php
      foreach($status_list as $server_name => $status) {
        ?>
        <div class="panel panel-default server-panel">
            <div class="panel-heading"><?=$server_name?>: 
                <?php
                if($status['status'] == Yii::$app->AppHelper::$ONLINE) {
                    echo count($status['online_list']);
                } else {
                    echo Yii::t('frontend','выключен');
                }
                ?>
            </div>
        </div>      
        <?php
      }
      ?>
  </div>
</div>