<?php

namespace app\models;


class Order extends Record
{
    public $id;
    public $user_id;
    public $product_id;
    public $quantity;

    public static function getTableName(): string
    {
        return "order";
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @param mixed $product_id
     */
    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
        return $this;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

}