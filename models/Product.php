<?php
namespace models;


class Product extends Model
{
    protected $id;
    protected $name;
    protected $description;
    protected $price;
    protected $category_id;



    public function getTableName(): string
    {
        return "products";
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;

    }

    /**
     * @param mixed $id
     * @return Product
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return int
     */
    public function getCategoryId():int
    {
        return $this->category_id;
    }

    /**
     * @param mixed $category_id
     * @return Product
     */
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
        return $this;
    }


}