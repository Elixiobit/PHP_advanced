<?php
//Lesson4
require $_SERVER['DOCUMENT_ROOT'] . "/../config/main.php";
require ROOT_DIR . "services/Autoloader.php";

spl_autoload_register([new app\services\Autoloader(), 'loadClass']);

//$product = \app\models\Product::getById(1);
//$product->name_product;
//$product->insertItem();
// ДЗ как избавиться от статики getById
session_start();
$controllerName = $_GET['c'] ?: 'product';
$actionName = $_GET['a'];
var_dump($_SESSION);

$controllerClass = "app\controllers\\" . ucfirst($controllerName) . "Controller";
if(class_exists($controllerClass)) {
    /** @var app\controllers\ProductController $controller */
    $controller = new $controllerClass(
        new \app\services\renderers\TemplateRenderer()
    );
    $controller->runAction($actionName);

}