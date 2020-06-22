<?php


namespace app\controllers;


use app\models\Cart;
use app\models\Product;

class CartController extends Controller
{
    public function actionIndex(int $userId = 0)
    {
        $cart = new Cart($userId);
        echo $this->render('cart', ['cart' => $cart]);
    }
}