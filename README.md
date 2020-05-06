
`route.php`
```
$app->get('/orders', 'App\Controllers\OrderController:index');

$app->get('/users', function ($request, $response, $args) {
    $users = App\User::get();
    return $response->withJson($users);
});

$app->get('/hello/{name}', function ($request, $response, $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    return $response;
});
```