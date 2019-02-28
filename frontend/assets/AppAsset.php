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
        //'css/site.css',
        'css/style.css',
        'css/font-awesome.min.css',
        'css/bootstrap.min.css',
        'css/bootstrap-select.min.css',
        'css/jobworld.css',
        'css/jobworld-media.css',
        'css/owl.carousel.min.css',
        'css/owl.theme.default.css',
        'css/animate.css',
        'css/map.css',
        'css/custom.css',
    ];

    public $js = [
      //'js/jquery-2.2.1.min.js',
      //'js/jquery.mobile.custom.min.js',
      'js/popper.min.js',
      //'js/bootstrap.min.js',
      'js/bootstrap-select.min.js',
      'js/jobworld.js',
      'js/owl.carousel.min.js',
      //'js/map_infobox.js',
      'js/markerclusterer.js',
      'js/map.js',
      'js/custom.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
