<?php


namespace app\controllers;


use app\base\App;

class AccountController extends Controller
{
    public function actionIndex()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(App::getInstance()->request->post('logout')){
                App::getInstance()->session->deleteSession();
            }
        }

        if ($login = App::getInstance()->session->getParam('user_login')) {
            $userName = App::getInstance()->session->getParam('user_name');
            echo $this->render('account', ['login' => $login, 'userName' => $userName]);
        }else {
            App::getInstance()->request->redirect('/login');
        }
    }
}