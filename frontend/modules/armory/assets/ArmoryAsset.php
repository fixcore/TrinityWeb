<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\modules\armory\assets;

use yii\bootstrap\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

use common\assets\Html5shiv;

use frontend\assets\FrontendAsset;

/**
 * Frontend application asset
 */
class ArmoryAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@armory';

    /**
     * @var array
     */
    public $css = [
        'css/armory.css',
    ];

    /**
     * @var array
     */
    public $js = [
        'js/armory.js',
    ];

    /**
     * @var array
     */
    public $depends = [
        //YiiAsset::class,
        //BootstrapAsset::class,
        FrontendAsset::class,
        //Html5shiv::class,        
    ];
}
