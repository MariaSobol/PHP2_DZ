<?php


namespace app\controllers;


use app\models\Cart;
use app\models\UserOrders;
use app\services\Request;
use app\services\Session;

class OrdersController extends Controller
{
    public function actionIndex(int $userId = 0)
    {
        if(!($userId = (new Session())->getParam('user_id'))){
            (new Request())->redirect('/login');
        }

        $orders = new UserOrders($userId);
        $orders->setOrders();

        echo $this->render('my_orders', ['orders' => $orders]);
    }
}