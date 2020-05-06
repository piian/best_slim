## 单文件，引入`simple.php`即可使用

## 多文件
入口文件`route.php`
路由文件 `route.php`

路由例子：
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