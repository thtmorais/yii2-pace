<?php

namespace thtmorais\pace;

use Yii;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 * Class Pace
 * @package thtmorais\pace
 */
class Pace extends Widget
{
    /**
     * @var string
     */
    public $color;
    /**
     * @var string
     */
    public $theme;
    /**
     * @var array
     */
    public $options;

    /**
     * 
     */
    public function init()
    {
        parent::init();
    }

    /**
     * @return string|void
     * @throws \yii\base\InvalidConfigException
     */
    public function run()
    {
        $paceOptions = [];

        if (ArrayHelper::keyExists('paceOptions', Yii::$app->params)){
            $paceOptions = ArrayHelper::getValue(Yii::$app->params,'paceOptions');
        }

        if(ArrayHelper::keyExists('color',$paceOptions) && ArrayHelper::getValue($paceOptions,'color') != '' && ArrayHelper::getValue($paceOptions,'color') != null && $this->color === null) {
            $this->color = ArrayHelper::getValue($paceOptions,'color');
        }elseif ($this->color === null){
            $this->color = 'blue';
        }

        if(ArrayHelper::keyExists('theme',$paceOptions) && ArrayHelper::getValue($paceOptions,'theme') != '' && ArrayHelper::getValue($paceOptions,'theme') != null && $this->theme === null) {
            $this->theme = ArrayHelper::getValue($paceOptions,'theme');
        }elseif ($this->theme === null){
            $this->theme = 'minimal';
        }

        if(ArrayHelper::keyExists('options',$paceOptions) && ArrayHelper::getValue($paceOptions,'options') != '' && ArrayHelper::getValue($paceOptions,'options') != null && $this->options === null) {
            $this->getView()->registerJs('window.paceOptions=' . Json::encode(ArrayHelper::getValue($paceOptions,'options')), \yii\web\View::POS_BEGIN);
        }

        PaceAsset::register($this->getView());
        $asset = Yii::$app->assetManager->publish("@npm/pace-js",['forceCopy' => YII_DEBUG]);

        $this->getView()->registerCssFile(ArrayHelper::getValue($asset,'1').'/themes/'.$this->color.'/pace-theme-'.$this->theme.'.css');
    }
}
