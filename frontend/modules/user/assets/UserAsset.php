<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\modules\user\assets;

use yii\bootstrap\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

use common\assets\Html5shiv;

use frontend\assets\FrontendAsset;

/**
 * Frontend application asset
 */
class UserAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@userPanel';

    /**
     * @var array
     */
    public $css = [
        'css/user-panel.css',
    ];

    /**
     * @var array
     */
    public $js = [
        'js/user-panel.js',
    ];

    /**
     * @var array
     */
    public $depends = [
        YiiAsset::class,
        BootstrapAsset::class,
        Html5shiv::class,
        FrontendAsset::class,
    ];
}
