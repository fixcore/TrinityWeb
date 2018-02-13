<?php

namespace common\modules\forum\assets;

use yii\web\AssetBundle;

use yii\web\YiiAsset;
use yii\bootstrap\BootstrapAsset;
use common\assets\Html5shiv;
use frontend\assets\FrontendAsset;

/**
 * Podium Assets
 *
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.1
 */
class PodiumAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@podium';

    /**
     * @inheritdoc
     */
    public $css = [
        'css/forum.css'
    ];
    
    /**
     * @inheritdoc
     */
    public $js = [
        'js/forum-app.js'
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        YiiAsset::class,
        BootstrapAsset::class,
        Html5shiv::class,
        FrontendAsset::class,
    ];
}
