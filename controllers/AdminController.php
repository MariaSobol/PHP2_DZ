<?php


namespace app\controllers;


use app\base\App;
use app\models\records\Product;

class AdminController extends Controller
{
    public function actionIndex()
    {
        $products = App::getInstance()->modelFactory->getAll("Product");
        echo $this->render('catalog_admin', ['products' => $products]);
    }


    public function actionAddform()
    {
        echo $this->render('upload_product');
    }

    public function actionChangeform()
    {
        $id = App::getInstance()->request->post('product_id');
        $product = App::getInstance()->modelFactory->getById("Product", $id);
        echo $this->render('change_product', ['product' => $product]);
    }

    //action для добавления и изменения товара
    public function actionChange()
    {
        $name = App::getInstance()->request->post('name');
        $description = App::getInstance()->request->post('description');
        $price = App::getInstance()->request->post('price');
        $category_id = App::getInstance()->request->post('category');

        $imageDir = App::getInstance()->getConfig('imagesDir');
        if ($originalFilename = App::getInstance()->request->uploadFile($imageDir, 'my_file')){
            $imagelink = '/img/'. $originalFilename;
        }
        elseif ($oldImagelink = App::getInstance()->request->post('old_imagelink')){
            //В случае если новое изображение не загружено и есть поле со значением ссылки на старое изображение,
            // оставляем ссылку на старое изображение
            $imagelink = $oldImagelink;
        }
        else{
            $imagelink = "https://dummyimage.com/300x300/2dc239/fff.png&text=product";
        }

        $product = new Product($name, $description, $price, $category_id, $imagelink);

        //Если в post приходит значение поля id, записываем его в поле объекта $product
        //В этом случае метод save() объекта $product отработает на insert
        //(в случае когда в базе найдётся продукт с таким id)
        if($id = App::getInstance()->request->post('id')){
            $product->setId($id);
        }

        $product->save();

        App::getInstance()->request->redirect('/admin');
    }

    public function actionDelete()
    {
        $id = App::getInstance()->request->post('id');
        $product = App::getInstance()->modelFactory->getById("Product", $id);
        $product->delete();
        App::getInstance()->request->redirect('/admin');
    }
}