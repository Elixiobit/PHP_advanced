<?php
namespace  app\interfaces;

use app\models\Model;

interface IModel
{
    public function getById(int $id): IModel;

    public function getALl();

    public function getTableName(): string;

}