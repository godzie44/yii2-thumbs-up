<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\modules\yiithumbsup\widgets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ThumbsUpAssets extends AssetBundle
{
    public $sourcePath = '@app/modules/yiithumbsup/widgets/_assets';

    public $css = [
        'thumbs-up.css',
    ];

    public $js = [
        'thumbs-up.js',

    ];
    //public $jsOptions = ['position' => \yii\web\View::POS_END];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
