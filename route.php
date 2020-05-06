<?php

$app->get('/', function ($request, $response, $args) {
    $response->getBody()->write("Hello");
    return $response;
});