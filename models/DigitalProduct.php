<?php


namespace models;


class DigitalProduct extends Product
{
    public function getFinalValue($qty)
    {
        if (is_int($qty)){
            return $this->price * $qty;
        }
        return false;
    }
}