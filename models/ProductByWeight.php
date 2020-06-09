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
            //Добавляем к конечной стоимости процент в зависимости от количества приобретаемого товара
            if($qty < 10){
                return ($this->price * $qty) * 1.2;
            }
            elseif ($qty >= 10 && $qty < 50){
                return ($this->price * $qty) * 1.15;
            }
            else{
                return ($this->price * $qty) * 1.1;
            }
        }
        return false;
    }

    public function getProfitFromQty($qty){
        return $this->getFinalValue($qty) - $this->price * $qty;
    }
}