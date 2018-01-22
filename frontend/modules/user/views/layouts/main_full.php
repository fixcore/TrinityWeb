<?php
/* @var $this \yii\web\View */
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\Nav;

use common\widgets\Alert;

use frontend\modules\user\assets\UserAsset;

/* @var $content string */

UserAsset::register($this);

$this->beginContent('@frontend/views/layouts/base.php')
?>
    <div class="container">
        
        <?php echo Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

        <?= Alert::widget() ?>
        
        <div id="user-panel-header">
            <ul class="navbar-nav nav">
                <li>
                    <a href="/site/index" data-hover="Home">Home</a>
                </li>
                <li>
                    <a href="/page/about" data-hover="About">About</a>
                </li>
                <li>
                    <a href="/article/index" data-hover="Articles">Articles</a>
                </li>
                <li>
                    <a href="/site/contact" data-hover="Contact">Contact</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <?php echo $content ?>
            </div>
        </div>
    </div>
<?php $this->endContent() ?>