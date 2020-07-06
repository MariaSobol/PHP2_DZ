<?php


namespace app\controllers;


use app\base\App;
use app\models\UserOrders;

class OrdersController extends Controller
{
    public function actionIndex(int $userId = 0)
    {
        if(!($userId = App::getInstance()->session->getParam('user_id'))){
            App::getInstance()->request->redirect('/login');
        }

        $orders = new UserOrders($userId);
        $orders->setOrders();

        echo $this->render('my_orders', ['orders' => $orders]);
    }
}