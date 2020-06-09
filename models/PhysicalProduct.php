<?php


namespace models;


class PhysicalProduct extends Product
{
    public function getFinalValue($qty)
    {
        if (is_int($qty)){
            return $this->price * $qty;
        }
        return false;
    }
}