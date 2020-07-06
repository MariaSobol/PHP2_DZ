<?php


namespace app\controllers;


use app\base\App;
use app\models\Cart;

class CartController extends Controller
{
    public function actionIndex(int $userId = 0)
    {
        if(!($userId = App::getInstance()->session->getParam('user_id'))){
            App::getInstance()->request->redirect('/login');
        }

        $cart = new Cart($userId);
        $cart->setProducts();

        echo $this->render('cart', ['cart' => $cart]);
    }

    public function actionAdd()
    {
        if(!($userId = App::getInstance()->session->getParam('user_id'))){
            App::getInstance()->request->redirect('/login');
        }

        $productId = App::getInstance()->request->post('product_id');
        $productQty = App::getInstance()->request->post('quantity');

        $cart = new Cart($userId);
        $cart->addProduct($productId, $productQty);

        App::getInstance()->request->redirect('/product/card&id=' . $productId);
    }

    public function actionMake_order()
    {
        $userId = App::getInstance()->session->getParam('user_id');
        $cart = new Cart($userId);
        $cart->setProducts();
        $cart->makeOrder();
        App::getInstance()->request->redirect('/account');
    }

    public function actionChange_quantity()
    {
        $userId = App::getInstance()->session->getParam('user_id');
        $cart = new Cart($userId);

        if($id = App::getInstance()->request->post('add')){
            $cart->changeProductQuantity($id);
        } elseif ($id = App::getInstance()->request->post('reduce')) {
            $cart->changeProductQuantity($id, -1);
        } elseif ($id = App::getInstance()->request->post('delete')) {
            $cart->deleteProduct($id);
        }

        App::getInstance()->request->redirect('/cart');
    }
}