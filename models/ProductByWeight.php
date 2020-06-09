<?php


namespace models;


class ProductByWeight extends Product
{
    public function getFinalValue($qty)
    {
        if (is_numeric($qty)){
            return $this->price * $qty;
        }
        return false;
    }
}