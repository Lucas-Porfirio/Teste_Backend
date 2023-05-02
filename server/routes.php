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
    $routes->addRoute('GET', '/pessoa/new', function() {
        $oController = new \Source\Controller\ControllerFormPessoa();
        $oController->form();
    });
    $routes->addRoute('POST', '/pessoa/new', function() {
        $oController = new \Source\Controller\ControllerFormPessoa();
        $oController->create($_POST);
        header("Location: /");
    });
    $routes->addRoute('GET', '/pessoa/edit/{id:\d+}', function($aParam) {
        $oController = new \Source\Controller\ControllerFormPessoa();
        $oController->form($aParam, $_POST);
    });
    $routes->addRoute('POST', '/pessoa/edit/{id:\d+}', function($aParam) {
        $oController = new \Source\Controller\ControllerFormPessoa();
        $oController->update($aParam, $_POST);
        header("Location: /");
        exit;
    });
    $routes->addRoute('GET', '/pessoa/view/{id:\d+}', function($aParam) {
        $oController = new \Source\Controller\ControllerFormPessoa();
        $oController->show($aParam);
    });
    $routes->addRoute('GET', '/pessoa/confirm-delete/{id:\d+}', function($aParam) {
        $oController = new \Source\Controller\ControllerFormPessoa();
        $oController->confirmDelete($aParam);
    });
    $routes->addRoute('POST', '/pessoa/confirm-delete/{id:\d+}', function($aParam) {
        $oController = new \Source\Controller\ControllerFormPessoa();
        $oController->delete($aParam);
        header("Location: /");
        exit;
    });
};
