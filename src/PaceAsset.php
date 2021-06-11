<?php

namespace thtmorais\pace;

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
     * @var string[]
     */
    public $js = [
        YII_DEBUG ? 'pace.js' : 'pace.min.js'
    ];

    /**
     * @var array
     */
    public $jsOptions = [
        'position' => \yii\web\View::POS_HEAD
    ];
}
