<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace godzie44\yii\module\thumbsup\widgets;

use yii\web\AssetBundle;


class ThumbsUpAssets extends AssetBundle
{
    public $sourcePath = '@vendor/godzie44/yii2-thumbs-up/widgets/_assets';

    public $css = [
        'thumbs-up.css',
    ];

    public $js = [
        'thumbs-up.js',
    ];
   

    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}