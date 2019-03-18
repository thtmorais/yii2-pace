<?php
/**
 * Created by PhpStorm.
 * User: thtmo
 * Date: 18/03/2019
 * Time: 19:35
 */

namespace thtmorais\pace;

use Yii;
use yii\base\Widget;

/**
 * Class Pace
 * @package thtmorais\pace
 */
class Pace extends Widget
{
    public $color = 'blue';
    public $theme = 'minimal';
    public $options;

    /**
     *
     */
    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }

    /**
     * @return string|void
     * @throws \yii\base\InvalidConfigException
     */
    public function run()
    {
        if(!empty($this->options)){
            $this->getView()->registerJs('window.paceOptions='.json_encode($this->options),\yii\web\View::POS_BEGIN);
        }

        PaceAsset::register($this->getView());
        $asset = Yii::$app->assetManager->publish("@npm/pace-js",['forceCopy'=>YII_DEBUG]);

        $this->getView()->registerCssFile($asset[1].'/themes/'.$this->color.'/pace-theme-'.$this->theme.'.css');
    }
}