<?php
/**
 * Отображение для _search:
 *
 *   @category YupeView
 *   @package  yupe
 *   @author   Yupe Team <team@yupe.ru>
 *   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 *   @link     http://yupe.ru
 **/
$form = $this->beginWidget(
    'bootstrap.widgets.TbActiveForm', array(
        'action'      => Yii::app()->createUrl($this->route),
        'method'      => 'get',
        'type'        => 'vertical',
        'htmlOptions' => array('class' => 'well'),
    )
);
?>

<fieldset>
    <div class="row">
                    <div class="col-sm-3">
                <?php echo $form->textFieldGroup($model, 'id', array('widgetOptions' => array('htmlOptions' => array('class' => 'popover-help', 'data-original-title' => $model->getAttributeLabel('id'), 'data-content' => $model->getAttributeDescription('id'))))); ?>
            </div>
            <div class="col-sm-3">
                <?php echo $form->textFieldGroup($model, 'title', array('widgetOptions' => array('htmlOptions' => array('class' => 'popover-help', 'data-original-title' => $model->getAttributeLabel('name'), 'data-content' => $model->getAttributeDescription('name'))))); ?>
            </div>
            <div class="col-sm-3">
                <?php echo $form->textFieldGroup($model, 'status', array('widgetOptions' => array('htmlOptions' => array('class' => 'popover-help', 'data-original-title' => $model->getAttributeLabel('status'), 'data-content' => $model->getAttributeDescription('status'))))); ?>
            </div>
            <div class="col-sm-3">
                <?php echo $form->textAreaGroup($model, 'settings', array('widgetOptions' => array('htmlOptions' => array('class' => 'popover-help', 'rows' => 6, 'cols' => 50, 'data-original-title' => $model->getAttributeLabel('settings'), 'data-content' => $model->getAttributeDescription('settings'))))); ?>
            </div>
    </div>
</fieldset>

    <?php
    $this->widget(
        'bootstrap.widgets.TbButton', array(
            'context'     => 'primary',
            'encodeLabel' => false,
            'buttonType'  => 'submit',
            'label'       => '<i class="fa fa-search">&nbsp;</i> ' . Yii::t('countdown', 'Искать Обратный отсчет'),
        )
    ); ?>

<?php $this->endWidget(); ?>