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

$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($settings['settings']['db']);
$capsule->bootEloquent();

class User extends Illuminate\Database\Eloquent\Model{
    public function orders(){
        return $this->HasMany(Order::class);
    }
}
class Order extends Illuminate\Database\Eloquent\Model{
    public function user(){
        return $this->belongsTo(User::class);
    }
}

$app->get('/', function ($request, $response, $args) {
    $response->getBody()->write("Hello");
    return $response;
});
$app->get('/users', function ($request, $response, $args) {
    $users = User::get();
    return $response->withJson($users);
});
$app->get('/hello/{name}', function ($request, $response, $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    return $response;
});

// Run app
$app->run();