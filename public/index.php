<?php
require $_SERVER['DOCUMENT_ROOT'] . "/../config/main.php";
require ROOT_DIR . "services/Autoloader.php";

use app\models\Product;
use app\models\User;
use app\services\Autoloader;

spl_autoload_register([new Autoloader(), 'loadClass']);

//(new \app\services\Db())->getConnection(); //использовался для


//$product = new Product();

$user = new \app\models\Product();

//var_dump($user);

var_dump($user->getById(1));



//3) Сделать базовую архитектуру базы данных для магазина - должны быть таблички, товар, категория, заказ,
// позиции в закази и пользователи.(можно взять с прошлого проекта)
//Сделать модели для этих сущностей
//5) В моделях реализовать методы для CRUD (getOne и getAll уже есть). GetOne и GetAll должны воззврращать объект
// и массив объектов соответсвенно
//6)* Подумать о недостатках паттерна Singleton
//7)* Сделать так, чтобы при запросе из базы возвращался не массив, а объект модели, в которой делается запрос (например - Product)
