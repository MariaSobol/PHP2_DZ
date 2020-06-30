<?php


namespace app\models;

use app\models\records\ModelFactory;
use app\models\records\Order;
use app\models\records\ProductInCart;
use app\models\records\ProductInOrder;
use app\services\Db;

class Cart
{
    protected $userId = 0;
    protected $products = []; //массив продуктов в корзине, содержащий следующие данные: product_id, name, price, quantity
    //protected $productsInCart = []; //массив объектов класса ProductInCart (для работы с БД)

    /**
     * Cart constructor.
     * @param int $userId
     */
    public function __construct(int $userId = null)
    {
        $this->userId = $userId;
    }

    public function setProducts(){
        $sql = "SELECT product_in_cart.product_id, products.name, products.price, product_in_cart.quantity
                FROM product_in_cart
                JOIN products ON product_in_cart.product_id=products.id
                WHERE product_in_cart.user_id = {$this->userId}";

        $this->products = Db::getInstance()->queryAll($sql);
        return $this;
    }

    /**
     * @return array
     */
    public function getProducts(): array
    {
        return $this->products;
    }


//    public function setProductsInCart()
//    {
//        $this->productsInCart = (new ModelFactory())->getAllByParam("ProductInCart", "user_id", $this->userId);
//        return $this;
//    }
//
//
//    /**
//     * @return array
//     */
//    public function getProductsInCart(): array
//    {
//        return $this->productsInCart;
//    }


    public function clearCart()
    {
        $sql = "DELETE FROM product_in_cart
	    WHERE user_id = {$this->userId}";

        if (Db::getInstance()->execute($sql)){
            //$this->productsInCart = [];
            $this->products = [];
        }
    }

    public function getSum(){
        $sum = 0;
        foreach($this->products as $product) {
            $sum += $product['price'] * $product['quantity'];
        }
        return $sum;
    }

    public function addProduct(int $id, int $qty)
    {
        $productInCart = new ProductInCart($this->userId, $id, $qty);
        $productInCart->save();
    }

    public function changeProductQuantity(int $id, int $qty = 1)
    {
        $productInCart = (new ModelFactory())->getByIds("ProductInCart", ['user_id' => $this->userId,
                                                                            'product_id' => $id]);

        $qty = $qty + $productInCart->getQuantity();
        $productInCart->setQuantity($qty);

        if($productInCart->getQuantity() < 1) {
            $productInCart->delete();
        } else{
            $productInCart->save();
        }

    }

    public function deleteProduct(int $id)
    {
        $productInCart = (new ModelFactory())->getByIds("ProductInCart", ['user_id' => $this->userId,
                                                                            'product_id' => $id]);
        $productInCart->delete();
    }

    public function makeOrder()
    {
        if ($this->userId && $this->products){

            $order = new Order($this->userId, 1);
            $order->save();

            foreach ($this->products as $product){
                $productInOrder = new ProductInOrder($product['product_id'], $order->getId(), $product['quantity']);
                $productInOrder->save();
            }

            $this->clearCart();
        }
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

}