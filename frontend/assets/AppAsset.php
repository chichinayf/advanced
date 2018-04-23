<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'statics/css/common.css',
        'statics/css/desktop-fiesta-skqf9msu88t49529.css',
        'statics/css/main.css',
        'statics/css/screen.css',
//         'statics/css/site.css',
    ];
    public $js = [
    	'statics/js/b.js',
    	'statics/js/desktop-fiesta-skqf9msu88t49529.js',
    	'statics/js/hm.js',
    	'statics/js/meiqia.js',
    	'statics/js/pc_nb.js',
    	'statics/js/script.js',
    	'statics/js/scrollReveal.js',
    ];
    public $depends = [
//         'yii\web\YiiAsset',
//         'yii\bootstrap\BootstrapAsset',
    ];
}
