<?php


namespace app\models;


use app\services\Db;

class UserOrders
{
    protected $userId = 0;
    protected $orders = [];

    public function __construct(int $userId = null)
    {
        $this->userId = $userId;
    }

    public function setOrders(){
        $sql = "SELECT orders.id, order_status.status
                FROM orders
                JOIN order_status ON orders.status_id=order_status.id
                WHERE orders.user_id = {$this->userId}";

        $this->orders = Db::getInstance()->queryAll($sql);
        return $this;
    }

    /**
     * @return array
     */
    public function getOrders(): array
    {
        return $this->orders;
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