# yupe-countdown - Обратный отсчет

Документация [jquery.flipCountDown Plugin](http://xdsoft.net/jqplugins/flipcountdown/)

**Вызов виджета**

<?php $this->widget('application.modules.countdown.widgets.CountdownWidget.CountdownWidget', [
    'options'=>[
        'size'=>"lg"
    ]
]) ?>

**Параметры**

Параметр      | Значение по умолчанию          | Описание
--------------|--------------------------------|--------------------------
showHour      |true                            | Показать час
showMinute    |true                            | Показать минуту
showSecond    |true                            | Показать секунду
am            |false                           | -
tzoneOffset   |0                               | Смещение времени
speedFlip     |60                              | Скорость
period        |1000                            | Период
tick          |function(){ return new Date();} | - 
autoUpdate    |true                            | Автоматическое обновление
size          |'md'                            | Размер (lg, md, sm, xs)
beforeDateTime|false                           | -