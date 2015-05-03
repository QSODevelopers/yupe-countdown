# yupe-countdown - Обратный отсчет

Документация [jquery.flipCountDown Plugin](http://xdsoft.net/jqplugins/flipcountdown/)

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
tick          |function(){ return new Date();} | Функция которая выполняется каждую секунду, возвращает дату
autoUpdate    |true                            | Автоматическое обновление
size          |'md'                            | Размер (lg, md, sm, xs)
beforeDateTime|false                           | -

*Примеры:*

**Отсчет до даты 5/01/2016 00:00:01**

```php
$this->widget('application.modules.countdown.widgets.CountdownWidget.CountdownWidget',[
    'options'=>[
        'size'=>"md",
        'beforeDateTime'=> '5/01/2016 00:00:01'
    ]
]);
```

**Тукущее время**

```php
$this->widget('application.modules.countdown.widgets.CountdownWidget.CountdownWidget',[
    'options'=>[
        'size'=>"lg",
    ]
]);
```