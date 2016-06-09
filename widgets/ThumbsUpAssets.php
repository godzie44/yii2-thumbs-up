<?php


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