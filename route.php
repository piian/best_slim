<?php


$app->get('/', function ($request, $response, $args) {
    $response->getBody()->write("Hello");
    return $response;
});

$app->get('/orders', 'OrderController:index');

$app->get('/users', function ($request, $response, $args) {
    $users = App\Models\User::get();
    return $response->withJson($users);
});
$app->get('/hello/{name}', function ($request, $response, $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    return $response;
});