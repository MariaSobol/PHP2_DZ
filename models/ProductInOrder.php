<?php


namespace app\models;


class ProductInOrder extends Model
{
    protected $product_id;
    protected $order_id;
    protected $quantity;

    /**
     * ProductInOrder constructor.
     * @param $product_id
     * @param $order_id
     * @param $quantity
     */
    public function __construct($product_id = null, $order_id = null, $quantity = null)
    {
        parent::__construct();
        $this->product_id = $product_id;
        $this->order_id = $order_id;
        $this->quantity = $quantity;
    }


    public function getTableName(): string
    {
        return "product_in_order";
    }

    public function getParamsForDb()
    {
        return ['product_id' => $this->product_id,
                'order_id' => $this->order_id,
                'quantity' => $this->quantity];
    }

    //TODO: переопределить методы для CRUD: getById(int $id), updateInDb(), delete()

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * @param mixed $product_id
     * @return mixed
     */
    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * @param mixed $order_id
     * @return mixed
     */
    public function setOrderId($order_id)
    {
        $this->order_id = $order_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     * @return mixed
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

}