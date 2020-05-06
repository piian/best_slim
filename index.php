<?php

// composer.json内容
// {
//     "require": {
//         "slim/slim": "3.*",
//         "illuminate/database": "~5.1"
//     }
// }


require 'vendor/autoload.php';


$settings = [
    'settings' => [
        'displayErrorDetails' => true,
        'db' => [      
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'slim',
            'username' => 'root',
            'password' => 'rootroot',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]
    ]
];
$app = new \Slim\App($settings);

// 加载Eloquent
$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($settings['settings']['db']);
$capsule->bootEloquent();

// 引入路由文件
require 'route.php';

// Run app
$app->run();