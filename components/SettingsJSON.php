<?php
class SettingsJSON extends CComponent
{
    public $formsFolder = 'application.modules.countdown.jsonForm';

    public function init()
    {
    }

    public function getParameters($widget)
    {
        $path = Yii::getPathOfAlias($this->formsFolder);
        $params = json_decode(file_get_contents($path.DIRECTORY_SEPARATOR.$widget.'.json'), true);
        return $params;
    }

    public function renderSettings($model, $widget, $return = false)
    {
        if ($widget===null)
            return false;

        if ($model!==null)
            $paymentSettings = CJSON::decode($model->settings);

        $params = $this->getParameters($widget);

        $settings = '';
        foreach ((array)$params['settings'] as $param) {
            $variable = $param['variable'];
            $options = isset($param['options']) ? CHtml::listData($param['options'], 'value', 'name') : [];
            
            $settings .= CHtml::openTag('div', ['class' => 'form-group']);
            $settings .= CHtml::label(Yii::t('CountdownModule.countdown', $param['name']), 'Settings_' . $variable, ['class' => 'control-label']);
            
            $value = isset($paymentSettings[$variable]) ? $paymentSettings[$variable] : null;

            switch ($param['type']) {
                case 'radio':
                    $settings .= '<div class="radio">'.CHtml::radioButtonList('Settings[' . $variable . ']', $value, $options,[
                            'template' => "{beginLabel}{input}{labelTitle}{endLabel}"
                        ]
                    ).'</div>';
                break;
                case 'dropDown':
                    $settings .= CHtml::dropDownList('Settings[' . $variable . ']', $value, $options,[
                        'class' => 'form-control']
                    );
                break;
                default:
                    $settings .= CHtml::textField('Settings[' . $variable . ']', $value, ['class' => 'form-control']);
                    break;
            }

            $settings .= CHtml::closeTag('div');
        }
        if ($return) {
            return $this->wrapPanel($settings, $widget);
        } else {
            echo $this->wrapPanel($settings, $widget);
        }
    }

    public function wrapPanel($settings, $widget)
    {
        $string = CHtml::openTag('div', ['class'=>'panel panel-default']);
            $string .= CHtml::openTag('div', ['class'=>'panel-heading']);
                $string .= CHtml::openTag('span', ['class'=>'panel-title']);
                    $string .= Yii::t('CountdownModule.countdown', $widget);
                $string .= CHtml::closeTag('span');
            $string .= CHtml::closeTag('div');
            
            $string .= CHtml::openTag('div', ['class'=>'panel-body']);
            $string .= $settings;
            $string .= CHtml::closeTag('div');
            
        $string .= CHtml::closeTag('div');
        
        return $string;
    }
}
?>