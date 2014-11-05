<?php

namespace otsec\yii2\fladmin;

use yii\web\AssetBundle;

/**
 * Class DashboardAsset
 * @author Artem Belov <razor2909@gmail.com>
 */
class DashboardAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@vendor/otsec/yii2-fladmin/assets';

    /**
     * @inheritdoc
     */
    public $css = [
        'css/bootstrap-reset.css',
        'css/style.css',
        'css/style-responsive.css',
        'css/dashboard.css',
    ];

    /**
     * @inheritdoc
     */
    public $js = [
        'js/dashboard.js',
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
        'rmrevin\yii\fontawesome\AssetBundle',
    ];
}