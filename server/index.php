<?php
require_once __DIR__ . '/vendor/autoload.php';

$routes = require __DIR__ . '/routes.php';
$routeCacheFile = __DIR__ . '/cache/routes.cache';
if (file_exists($routeCacheFile)) {
    unlink($routeCacheFile);
}
$dispatcher = FastRoute\simpleDispatcher($routes);

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

// Lida com o resultado da rota
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $params = $routeInfo[2];
        call_user_func($handler, $params);
        break;
}
