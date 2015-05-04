<?php
/**
 * Отображение для index:
 *
 *   @category YupeView
 *   @package  yupe
 *   @author   Yupe Team <team@yupe.ru>
 *   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 *   @link     http://yupe.ru
 **/
    $this->breadcrumbs = array(
        Yii::app()->getModule('countdown')->getCategory() => array(),
        Yii::t('countdown', 'Обратные отсчеты') => array('/countdown/countdownBackend/index'),
        Yii::t('countdown', 'Управление'),
    );

    $this->pageTitle = Yii::t('countdown', 'Обратные отсчеты - управление');

    $this->menu = array(
        array('icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('countdown', 'Управление Обратными отсчетами'), 'url' => array('/countdown/countdownBackend/index')),
        array('icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('countdown', 'Добавить Обратный отсчет'), 'url' => array('/countdown/countdownBackend/create')),
    );
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('countdown', 'Обратные отсчеты'); ?>
        <small><?php echo Yii::t('countdown', 'управление'); ?></small>
    </h1>
</div>

<p>
    <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="collapse" data-target="#search-toggle">
        <i class="fa fa-search">&nbsp;</i>
        <?php echo Yii::t('countdown', 'Поиск Обратных отсчетов');?>
        <span class="caret">&nbsp;</span>
    </a>
</p>

<div id="search-toggle" class="collapse out search-form">
    <?php
Yii::app()->clientScript->registerScript('search', "
    $('.search-form form').submit(function () {
        $.fn.yiiGridView.update('countdown-grid', {
            data: $(this).serialize()
        });

        return false;
    });
");
$this->renderPartial('_search', array('model' => $model));
?>
</div>

<br/>

<p> <?php echo Yii::t('countdown', 'В данном разделе представлены средства управления Обратными отсчетами'); ?>
</p>

<?php
 $this->widget('yupe\widgets\CustomGridView', array(
'id'           => 'countdown-grid',
'type'         => 'striped condensed',
'dataProvider' => $model->search(),
'filter'       => $model,
'columns'      => array(
        'id',
        'title',
        'status',
        'settings',
array(
'class' => 'yupe\widgets\CustomButtonColumn',
),
),
)); ?>
