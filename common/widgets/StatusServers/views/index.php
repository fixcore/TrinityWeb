<div class="panel panel-default" id="widget-status_servers">
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
                if($status['status'] == 'on') {
                    echo count($status['online_list']);
                } else {
                    echo 0;
                }
                ?>
            </div>
        </div>      
        <?php
      }
      ?>
  </div>
</div>