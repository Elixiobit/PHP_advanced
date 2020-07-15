<?php
namespace  app\interfaces;

use app\models\Model;

interface IModel
{
    public static function getById(int $id): Model;

    public static function getALl();

    public static function getTableName(): string;

    public function deleteItem();

    public function insertItem();

    public function updateItem();

//    public function saveItem();


}