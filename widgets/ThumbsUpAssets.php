<<<<<<< HEAD
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
    //public $jsOptions = ['position' => \yii\web\View::POS_END];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
=======
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
>>>>>>> 4eb156c4e71ee4fba18e827d1a2045472e58c3f7
