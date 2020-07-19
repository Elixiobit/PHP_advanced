<?php
namespace  app\interfaces;

use app\models\Record;

interface IRecord
{
    public static function getById(int $id): Record;

    public static function getALl();

    public static function getTableName(): string;

    public function deleteItem();

    public function insertItem();

    public function updateItem();

    public function saveItem();


}