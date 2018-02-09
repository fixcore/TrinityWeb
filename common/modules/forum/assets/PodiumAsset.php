<?php

namespace common\modules\forum\assets;

use yii\web\AssetBundle;

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
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
