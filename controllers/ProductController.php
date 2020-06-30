<?php


namespace app\controllers;


use app\models\records\ModelFactory;
use app\models\records\Product;
use app\services\Request;

class ProductController extends Controller
{
    public function actionIndex()
    {
        $products = (new ModelFactory())->getAll("Product");
        echo $this->render('catalog', ['products' => $products]);
    }

    public function actionCard()
    {
        $id = (new Request())->get('id');
        $model = (new ModelFactory())->getById("Product", $id);
        echo $this->render('product_card', ['model' => $model]);
    }
}