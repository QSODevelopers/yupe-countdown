<?php
/**
* 
*/
class CountdownWidget extends \yupe\widgets\YWidget
{
    public $id = 'retroclockbox';
    public $options = [];
    public function init()
    {
        $assets = Yii::app()->assetManager->publish(
            Yii::getPathOfAlias('countdown.widgets.CountdownWidget.assets')
        );
        Yii::app()->clientScript->registerScriptFile($assets.'/jquery.flipcountdown.js');
        Yii::app()->clientScript->registerCssFile($assets.'/jquery.flipcountdown.css');
        Yii::app()->clientScript->registerScript('countdown', "
            jQuery(function($){
                var i = 1000;
                $('#".$this->id."').flipcountdown(".CJavaScript::encode($this->options).");
            })
        ");
        parent::init();
    }
    public function run()
    {
        echo '<div id="'.$this->id.'"></div>';
    }
}
?>