<?php
use FastRoute\RouteCollector;

return function (RouteCollector $routes) {
    $routes->addRoute('GET', '/', function($aParam) {
        $oController = new \Source\Controller\ControllerPessoa();
        $oController->index($aParam);
    });
    $routes->addRoute('GET', '/{nome:[a-zA-Z]+?}', function($aParam) {
        $oController = new \Source\Controller\ControllerPessoa();
        $oController->index($aParam);
    });
    $routes->addRoute('GET', '/pessoa/form/{id:\d+}', function($aParam) {
        \Source\Controller\ControllerPessoa::form($aParam);
    });
};
