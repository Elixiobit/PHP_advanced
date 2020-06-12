<?php
require $_SERVER['DOCUMENT_ROOT'] . "/../services/Autoloader.php";

use interfaces\ModelInterface;
use models\Product;
use models\User;

spl_autoload_register([new Autoloader(), 'loadClass']);

$product = new Product();
var_dump($product);
$user = new User();
var_dump($user);

//$product->setCategoryId()
//    ->setDescription();
//function foo(ModelInterface $object){
//    var_dump($object->getById());
//}
