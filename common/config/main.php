<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'db' => [
           'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=yiitaskforce_db',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8mb4_general_ci',
           
        ],
     /* 'urlManager' => [
            'enablePrettyUrl' => false,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
                '<module:gii>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>', 
            ],
        ],
        
       */ 
    ]
];
