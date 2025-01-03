<?php

namespace thtmorais\pace;

use yii\web\View;
use yii\web\AssetBundle;

/**
 * Class PaceAsset
 * @package thtmorais\pace
 */
class PaceAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = "@npm/pace-js/";

    /**
     * @var array
     */
    public $js = [
        YII_DEBUG ? 'pace.js' : 'pace.min.js'
    ];

    /**
     * @var array
     */
    public $jsOptions = [
        'position' => View::POS_HEAD
    ];
}
