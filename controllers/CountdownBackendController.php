<?php
/**
* Класс CountdownBackendController:
*
*   @category Yupeyupe\components\controllers\BackController
*   @package  yupe
*   @author   Yupe Team <team@yupe.ru>
*   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
*   @link     http://yupe.ru
**/
class CountdownBackendController extends yupe\components\controllers\BackController
{
    /**
    * Отображает Обратный отсчет по указанному идентификатору
    *
    * @param integer $id Идинтификатор Обратный отсчет для отображения
    *
    * @return void
    */
    public function actionView($id)
    {
        $this->render('view', array('model' => $this->loadModel($id)));
    }

    /**
    * Создает новую модель Обратного отсчета.
    * Если создание прошло успешно - перенаправляет на просмотр.
    *
    * @return void
    */
    public function actionCreate()
    {
        $model = new Countdown;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Countdown'])) {
            $model->attributes = $_POST['Countdown'];
            
            if ($model->save()) {
                Yii::app()->user->setFlash(
                    yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                    Yii::t('countdown', 'Запись добавлена!')
                );

                if (!isset($_POST['submit-type']))
                    $this->redirect(array('update', 'id' => $model->id));
                else
                    $this->redirect(array($_POST['submit-type']));
            }
        }
        $this->render('create', array('model' => $model));
    }

    /**
    * Редактирование Обратного отсчета.
    *
    * @param integer $id Идинтификатор Обратный отсчет для редактирования
    *
    * @return void
    */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Countdown'])) {
            $model->attributes = $_POST['Countdown'];

            if ($model->save()) {
                Yii::app()->user->setFlash(
                    yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                    Yii::t('countdown', 'Запись обновлена!')
                );

                if (!isset($_POST['submit-type']))
                    $this->redirect(array('update', 'id' => $model->id));
                else
                    $this->redirect(array($_POST['submit-type']));
            }
        }
        $this->render('update', array('model' => $model));
    }

    /**
    * Удаляет модель Обратного отсчета из базы.
    * Если удаление прошло успешно - возвращется в index
    *
    * @param integer $id идентификатор Обратного отсчета, который нужно удалить
    *
    * @return void
    */
    public function actionDelete($id)
    {
        if (Yii::app()->getRequest()->getIsPostRequest()) {
            // поддерживаем удаление только из POST-запроса
            $this->loadModel($id)->delete();

            Yii::app()->user->setFlash(
                yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                Yii::t('countdown', 'Запись удалена!')
            );

            // если это AJAX запрос ( кликнули удаление в админском grid view), мы не должны никуда редиректить
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        } else
            throw new CHttpException(400, Yii::t('countdown', 'Неверный запрос. Пожалуйста, больше не повторяйте такие запросы'));
    }

    /**
    * Управление Обратными отсчетами.
    *
    * @return void
    */
    public function actionIndex()
    {
        $model = new Countdown('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Countdown']))
            $model->attributes = $_GET['Countdown'];
        $this->render('index', array('model' => $model));
    }

    /**
    * Возвращает модель по указанному идентификатору
    * Если модель не будет найдена - возникнет HTTP-исключение.
    *
    * @param integer идентификатор нужной модели
    *
    * @return void
    */
    public function loadModel($id)
    {
        $model = Countdown::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, Yii::t('countdown', 'Запрошенная страница не найдена.'));

        return $model;
    }

    /**
    * Производит AJAX-валидацию
    *
    * @param CModel модель, которую необходимо валидировать
    *
    * @return void
    */
    protected function performAjaxValidation(Countdown $model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'countdown-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionSettings()
    {
        $model = Countdown::model()->findByPk(Yii::app()->request->getParam('id'));
        $this->renderPartial('_settings',[
            'model'=>$model,
            'widget'=>Yii::app()->request->getParam('widget')
        ]);
    }
}
