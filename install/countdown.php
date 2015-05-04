<?php 
return [
    'module'    => [
        'class' => 'application.modules.countdown.CountdownModule',
    ],
    'import'    => [],
    'component' => [
        'jsonSettingsManager' => [
            'class' => 'application.modules.countdown.components.SettingsJSON'
        ],
    ],
    'rules'     => [],
];
 ?>