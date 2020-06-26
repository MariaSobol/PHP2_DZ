<?php


namespace app\controllers;


use app\models\Cart;
use app\services\Request;
use app\services\Session;

class CartController extends Controller
{
    public function actionIndex(int $userId = 0)
    {
        if(!($userId = (new Session())->getParam('user_id'))){
            (new Request())->redirect('/?c=login');
        }
        $cart = new Cart($userId);
        $cart->setCart();
        echo $this->render('cart', ['cart' => $cart]);
    }
}