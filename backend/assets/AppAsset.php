<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@bower/';
    public $css = [
        'admin-lte/bootstrap/css/bootstrap.min.css',
        'admin-lte/plugins/iCheck/all.css',
        //'admin-lte/plugins/select2/select2.min.css',
        'admin-lte/plugins/select2/select2-3.5.2.css',
        'admin-lte/plugins/datetimepicker/jquery.datetimepicker.css',
        'admin-lte/dist/css/AdminLTE.css',        
    ];
    public $js = [
        
        'admin-lte/dist/js/app.min.js',
        //'admin-lte/plugins/select2/select2.full.js',
        'admin-lte/plugins/select2/select2-3.5.2.min.js',
        'admin-lte/plugins/iCheck/icheck.min.js',
        'admin-lte/plugins/slimScroll/jquery.slimscroll.min.js',
        'admin-lte/plugins/ckeditor/ckeditor.js',
        'admin-lte/plugins/ckeditor/config.js',
        'admin-lte/plugins/datetimepicker/jquery.datetimepicker.js',
        
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
