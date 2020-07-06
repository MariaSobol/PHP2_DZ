<?php


namespace app\controllers;


use app\base\App;

class ProductController extends Controller
{
    public function actionIndex()
    {
        $products = App::getInstance()->modelFactory->getAll("Product");
        echo $this->render('catalog', ['products' => $products]);
    }

    public function actionCard()
    {
        $id = App::getInstance()->request->get('id');
        $model = App::getInstance()->modelFactory->getById("Product", $id);
        echo $this->render('product_card', ['model' => $model]);
    }
}