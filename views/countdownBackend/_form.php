<?php
/**
 * Отображение для _form:
 *
 *   @category YupeView
 *   @package  yupe
 *   @author   Yupe Team <team@yupe.ru>
 *   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 *   @link     http://yupe.ru
 *
 *   @var $model Countdown
 *   @var $form TbActiveForm
 *   @var $this CountdownBackendController
 **/
$form = $this->beginWidget(
    'bootstrap.widgets.TbActiveForm', array(
        'id'                     => 'countdown-form',
        'enableAjaxValidation'   => false,
        'enableClientValidation' => true,
        'htmlOptions'            => array('class' => 'well'),
    )
);
?>

<div class="alert alert-info">
    <?php echo Yii::t('countdown', 'Поля, отмеченные'); ?>
    <span class="required">*</span>
    <?php echo Yii::t('countdown', 'обязательны.'); ?>
</div>

<?php echo $form->errorSummary($model); ?>

    <div class="row">
        <div class="col-sm-6">
            <?php echo $form->textFieldGroup($model, 'title', array(
                'widgetOptions' => array(
                    'htmlOptions' => array(
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('title'),
                        'data-content' => $model->getAttributeDescription('title')
                    )
                )
            )); ?>

            <?php echo $form->dropDownListGroup($model, 'status', array(
                'widgetOptions' => array(
                    'data'=>$model->getStatusList(),
                    'htmlOptions' => array(
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('status'),
                        'data-content' => $model->getAttributeDescription('status')
                    )
                )
            )); ?>

            <?php echo $form->dropDownListGroup($model, 'widget', array(
                'widgetOptions' => array(
                    'data'=>$model->getWidgets(),
                    'htmlOptions' => array(
                        'class' => 'popover-help',
                        'empty' => '----',
                        'id'=>'widgets',
                        'data-original-title' => $model->getAttributeLabel('widget'),
                        'data-content' => $model->getAttributeDescription('widget')
                    )
                )
            )); ?>
        </div>

        <div class="col-sm-6" id="widget-settomgs">
            <?php $this->renderPartial('_settings', ['model'=>$model, 'widget'=>$model->widget]); ?>
        </div>
    </div>

    <?php
    $this->widget(
        'bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'context'    => 'primary',
            'label'      => Yii::t('countdown', 'Сохранить Обратный отсчет и продолжить'),
        )
    ); ?>
    <?php
    $this->widget(
        'bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'htmlOptions'=> array('name' => 'submit-type', 'value' => 'index'),
            'label'      => Yii::t('countdown', 'Сохранить Обратный отсчет и закрыть'),
        )
    ); ?>

<?php $this->endWidget(); ?>

<script type="text/javascript">
    $(document).ready(function () {
        $('#widgets').change(function () {
            var widget = this.value;
            if (widget) {
                $.ajax({
                    url: '<?php echo Yii::app()->createUrl("/countdown/countdownBackend/settings")?>',
                    type: 'get',
                    data: {
                        id: <?php echo $model->id ?: '""'?>,
                        widget: widget
                    },
                    success: function (data) {
                        $('#widget-settomgs').html(data);
                    }
                })
            }
            else {
                $('#widget-settomgs').html('');
            }
        })
    })
</script>