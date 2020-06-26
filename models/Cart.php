<?php


namespace app\models;

use app\services\Db;

class Cart
{
    protected $userId = 0;
    protected $productsInCart = [];

    /**
     * Cart constructor.
     * @param int $userId
     */
    public function __construct(int $userId = null)
    {
        $this->userId = $userId;
    }

    public function setCart(){
        $sql = "SELECT product_in_cart.product_id, products.name, products.price, product_in_cart.quantity
                FROM product_in_cart
                JOIN products ON product_in_cart.product_id=products.id
                WHERE product_in_cart.user_id = {$this->userId}";

        $this->setProductsInCart(Db::getInstance()->queryAll($sql));
    }

//    public static function getCartByUserId(int $userId){
//        $cart = new Cart();
//        $cart->setUserId($userId);
//        $sql = "SELECT product_in_cart.product_id, products.name, products.price, product_in_cart.quantity
//                FROM product_in_cart
//                JOIN products ON product_in_cart.product_id=products.id
//                WHERE product_in_cart.user_id = {$userId}";
//        $cart->setProductsInCart(Db::getInstance()->queryAll($sql));
//        return $cart;
//    }

    public function getSum(){
        $sum = 0;
        foreach($this->productsInCart as $product) {
            $sum += $product['price'] * $product['quantity'];
        }
        return $sum;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId)
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return array
     */
    public function getProductsInCart(): array
    {
        return $this->productsInCart;
    }

    /**
     * @param array $productsInCard
     */
    public function setProductsInCart(array $productsInCart)
    {
        $this->productsInCart = $productsInCart;
        return $this;
    }

}