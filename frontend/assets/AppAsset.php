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
        'css/site.css',
        'css/style.css',
        'css/font-awesome.min.css',
<<<<<<< HEAD
        '//fonts.googleapis.com/css?family=Oswald:300'
=======
>>>>>>> origin/master
    ];
    public $js = [
        'js/script.js',
        'js/yii_overrides.js',
        'js/modal.js',
<<<<<<< HEAD
        'js/component.js',
        'js/autobahn.min.js'
=======
        'js/component.js'
>>>>>>> origin/master
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'frontend\assets\SweetAlertAsset',
    ];
}
