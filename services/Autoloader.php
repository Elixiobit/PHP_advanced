<?php

class Autoloader
{

    public function loadClass(string $classname)
    {
        $classname = explode('\\', $classname);
        $classname = implode('/', $classname);
//        var_dump($classname);
//        $filename = realpath($_SERVER['DOCUMENT_ROOT'] . "/../{$classname}.php");
        $filename = $_SERVER['DOCUMENT_ROOT'] . "/../{$classname}.php";
        if (file_exists($filename)) {
            require $filename;
            return true;
        }
        return false;
    }
}