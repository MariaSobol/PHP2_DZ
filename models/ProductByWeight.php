<?php


namespace models;


class ProductByWeight extends Product
{
    public function __construct($name, $description = null, $price = null, $category_id = null)
    {
        parent::__construct($name, $description, $price, $category_id);
    }

    public function getFinalValue($qty)
    {
        if (is_numeric($qty)){
            return $this->price * $qty;
        }
        return false;
    }
}