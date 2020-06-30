<?php


namespace app\controllers;


use app\models\Cart;
use app\models\records\ModelFactory;
use app\services\Request;
use app\services\Session;

class CartController extends Controller
{
    public function actionIndex(int $userId = 0)
    {
        if(!($userId = (new Session())->getParam('user_id'))){
            (new Request())->redirect('/login');
        }

        $cart = new Cart($userId);
        $cart->setProducts();

        echo $this->render('cart', ['cart' => $cart]);
    }

    public function actionAdd()
    {
        if(!($userId = (new Session())->getParam('user_id'))){
            (new Request())->redirect('/login');
        }

        $request = new Request();
        $productId = $request->post('product_id');
        $productQty = $request->post('quantity');

        $cart = new Cart($userId);
        $cart->addProduct($productId, $productQty);

        $request->redirect('/product/card&id=' . $productId);
    }

    public function actionMake_order()
    {
        $userId = (new Session())->getParam('user_id');
        $cart = new Cart($userId);
        $cart->setProducts();
        $cart->makeOrder();
        (new Request())->redirect('/account');
    }

    public function actionChange_quantity()
    {
        $userId = (new Session())->getParam('user_id');
        $cart = new Cart($userId);

        $request = new Request();

        if($id = $request->post('add')){
            $cart->changeProductQuantity($id);
        } elseif ($id = $request->post('reduce')) {
            $cart->changeProductQuantity($id, -1);
        } elseif ($id = $request->post('delete')) {
            $cart->deleteProduct($id);
        }

        $request->redirect('/cart');
    }
}