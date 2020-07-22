<?php

namespace app\traits;

trait TSingleton
{
    private static $instance = null;

    private function __construct() {} // нельзя из вне создать элемент класса

    private function __wakeup() {}

    private function __clone() {}


    /**
     * @return static
     */
    public static function getInstance() //проверяем наличие созданного объекта Db, если отсутствует,то создаем.
    {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }
}