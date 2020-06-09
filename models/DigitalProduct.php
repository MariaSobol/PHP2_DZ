<?php


namespace models;


class DigitalProduct extends Product
{
    //Т.к. по заданию предполагается привязка цены цифрового товара к цене физического,
    //значит надо предусмотреть возможность создания цифрового товара на основании физицеского
    public function __construct(PhysicalProduct $product)
    {
        parent::__construct($product->name, $product->description, ($product->price)/2, $product->category_id);
    }

    public function getFinalValue($qty)
    {
        if (is_int($qty)){
            return $this->price * $qty;
        }
        return false;
    }
}