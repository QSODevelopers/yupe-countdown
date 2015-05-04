<?php
/**
 * Отображение для create:
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
        Yii::t('countdown', 'Добавление'),
    );

    $this->pageTitle = Yii::t('countdown', 'Обратные отсчеты - добавление');

    $this->menu = array(
        array('icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('countdown', 'Управление Обратными отсчетами'), 'url' => array('/countdown/countdownBackend/index')),
        array('icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('countdown', 'Добавить Обратный отсчет'), 'url' => array('/countdown/countdownBackend/create')),
    );
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('countdown', 'Обратные отсчеты'); ?>
        <small><?php echo Yii::t('countdown', 'добавление'); ?></small>
    </h1>
</div>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>