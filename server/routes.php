<?php
use FastRoute\RouteCollector;

return function (RouteCollector $routes) {
    $routes->addRoute('GET', '/', function($aParam) {
        $oController = new \Source\Controller\ControllerTablePessoa();
        $oController->index($aParam);
    });
    $routes->addRoute('POST', '/', function($aParam) {
        $oController = new \Source\Controller\ControllerTablePessoa();
        $oController->index($_POST);
    });
    // $routes->addRoute('GET', '/{nome:[a-zA-Z]+?}', function($aParam) {
    //     $oController = new \Source\Controller\ControllerPessoa();
    //     $oController->index($aParam);
    // });
    $routes->addRoute('GET', '/pessoa/edit/{id:\d+}', function($aParam) {
        $oController = new \Source\Controller\ControllerFormPessoa();
        $oController->form($aParam);
    });
    $routes->addRoute('GET', '/pessoa/view/{id:\d+}', function($aParam) {
        $oController = new \Source\Controller\ControllerFormPessoa();
        $oController->show($aParam);
    });
};
