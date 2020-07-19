<?php
namespace app\models;


class Product extends Record
{
    public $id;
    public $name_product;
    public $description;
    public $price;
    public $category_id;

    /**
     * Product constructor.
     * @param $id
     * @param $name_product
     * @param $description
     * @param $price
     * @param $category_id
     */
    public function __construct($id = null, $name_product = null, $description = null, $price = null, $category_id = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->name_product = $name_product;
        $this->description = $description;
        $this->price = $price;
        $this->category_id = $category_id;
    }


    public static function getTableName(): string
    {
        return "products";
    }



}