<?php
require $_SERVER['DOCUMENT_ROOT'] . "/../config/main.php";
require ROOT_DIR . "services/Autoloader.php";

spl_autoload_register([new app\services\Autoloader(), 'loadClass']);

//(new \app\services\Db())->getConnection(); //использовался для


$product = \app\models\Product::getById(1);
//$product = new \app\models\Product();


var_dump($product);
//$product->name_product;
//$product->insertItem();


// ДЗ как избавиться от статики getById