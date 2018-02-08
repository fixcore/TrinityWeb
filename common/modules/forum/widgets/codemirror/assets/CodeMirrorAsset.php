<?php

namespace common\modules\forum\widgets\codemirror\assets;

use yii\web\AssetBundle;

/**
 * CodeMirror Assets
 *
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.6
 */
class CodeMirrorAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $depends = [
        'common\modules\forum\widgets\codemirror\assets\CodeMirrorLibAsset',
        'common\modules\forum\widgets\codemirror\assets\CodeMirrorExtraAsset',
        'common\modules\forum\widgets\codemirror\assets\CodeMirrorModesAsset',
        'common\modules\forum\widgets\codemirror\assets\CodeMirrorButtonsAsset',
        'common\modules\forum\widgets\codemirror\assets\CodeMirrorConfigAsset'
    ];
}
