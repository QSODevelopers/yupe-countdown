<?php
/**
* 
*/
Yii::import('application.modules.countdown.models.Countdown');
class CountdownWidget extends \yupe\widgets\YWidget
{
    public $id = 'retroclockbox';
    public $title;
    public $tagHeader = 'h3';
    public $model_id;
    public $options = [];

    public function init()
    {
        if (isset($this->model_id) && is_int($this->model_id)) {
            $model = Countdown::model()->findByPk($this->model_id);
            if ($model===null)
                throw new CException('В базе нет такой записи');

            $this->options = CJSON::decode($model->settings);
            $this->title = $model->title;
        }

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
        $txt = CHtml::openTag($this->tagHeader);
        $txt .= $this->title;
        $txt .= CHtml::closeTag($this->tagHeader);
        $txt .= '<div id="'.$this->id.'"></div>';
        echo $txt;
    }
}
?>