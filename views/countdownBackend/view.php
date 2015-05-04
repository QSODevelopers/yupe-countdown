<?php
/**
 * Отображение для view:
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
        $model->name,
    );

    $this->pageTitle = Yii::t('countdown', 'Обратные отсчеты - просмотр');

    $this->menu = array(
        array('icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('countdown', 'Управление Обратными отсчетами'), 'url' => array('/countdown/countdownBackend/index')),
        array('icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('countdown', 'Добавить Обратный отсчет'), 'url' => array('/countdown/countdownBackend/create')),
        array('label' => Yii::t('countdown', 'Обратный отсчет') . ' «' . mb_substr($model->id, 0, 32) . '»'),
        array('icon' => 'fa fa-fw fa-pencil', 'label' => Yii::t('countdown', 'Редактирование Обратного отсчета'), 'url' => array(
            '/countdown/countdownBackend/update',
            'id' => $model->id
        )),
        array('icon' => 'fa fa-fw fa-eye', 'label' => Yii::t('countdown', 'Просмотреть Обратный отсчет'), 'url' => array(
            '/countdown/countdownBackend/view',
            'id' => $model->id
        )),
        array('icon' => 'fa fa-fw fa-trash-o', 'label' => Yii::t('countdown', 'Удалить Обратный отсчет'), 'url' => '#', 'linkOptions' => array(
            'submit' => array('/countdown/countdownBackend/delete', 'id' => $model->id),
            'confirm' => Yii::t('countdown', 'Вы уверены, что хотите удалить Обратный отсчет?'),
            'csrf' => true,
        )),
    );
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('countdown', 'Просмотр') . ' ' . Yii::t('countdown', 'Обратного отсчета'); ?>        <br/>
        <small>&laquo;<?php echo $model->name; ?>&raquo;</small>
    </h1>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
'data'       => $model,
'attributes' => array(
        'id',
        'name',
        'status',
        'settings',
),
)); ?>
