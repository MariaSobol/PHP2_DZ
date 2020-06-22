<?php


namespace app\controllers;


use app\models\ModelFactory;
use app\models\Product;

class ProductController extends Controller
{
    public function actionIndex()
    {
        $products = ModelFactory::getAll("Product");
        echo $this->render('catalog', ['products' => $products]);
    }

    public function actionCard()
    {
        $id = $_GET['id'];
        $model = ModelFactory::getById("Product", $id);
        echo $this->render('product_card', ['model' => $model]);
    }
}