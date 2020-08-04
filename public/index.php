<?php

require $_SERVER['DOCUMENT_ROOT'] . "/../config/main.php";
//require ROOT_DIR . "services/Autoloader.php";
//spl_autoload_register([new app\services\Autoloader(), 'loadClass']);
include VENDOR_DIR . "autoload.php"; // подключаем autoload composer

session_start();

$controllerName = $_GET['c'] ?: 'product';
$actionName = $_GET['a'] ?: 'index';

$controllerClass = "app\controllers\\" . ucfirst($controllerName) . "Controller";
if(class_exists($controllerClass)) {
    /** @var app\controllers\ProductController $controller */
    $controller = new $controllerClass(
        new \app\services\renderers\TemplateRenderer()
//        new \app\services\renderers\TwigRenderer() //через твиг
    );
    $controller->runAction($actionName);
}


