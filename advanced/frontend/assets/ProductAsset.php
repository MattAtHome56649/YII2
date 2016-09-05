<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Product page frontend application asset bundle.
 */
class ProductAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/sass/my_custom.scss',
    ];
    public $js = [
        'js/product.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    //public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
}
