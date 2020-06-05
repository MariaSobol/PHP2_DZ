<?php


class User extends Person
{
    private string $address;
    private array $cart;
    private array $orders;

    public function __construct(int $id, string $name, string $address = null, array $cart = null, array $orders = null)
    {
        parent::__construct($id, $name);
        $this->address = $address;
        $this->cart = $cart;
        $this->orders = $orders;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        //добавить проверку
        $this->address = $address;
    }

    public function getCart(): array
    {
        return $this->cart;
    }

    public function setCart(array $cart): void
    {
        $this->cart = $cart;
    }

    public function getOrders(): array
    {
        return $this->orders;
    }

    public function setOrders(array $orders): void
    {
        $this->orders = $orders;
    }

    public function makeOrder(){
        /*...*/
    }

    public function cancelOrder(int $orderId){
        /*...*/
    }

}