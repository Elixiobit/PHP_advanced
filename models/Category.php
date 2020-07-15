<?php

namespace app\models;

class Category extends Model
{
    public $id;
    public $name_category;

    public static function getTableName(): string
    {
        return "category";
    }

    /**
     * @param mixed $name_category
     */
    public function setNameCategory($name_category)
    {
        $this->name_category = $name_category;
        return $this;
    }



}