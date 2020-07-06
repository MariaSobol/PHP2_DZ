<?php


namespace app\controllers;


use app\base\App;
use app\services\Security;

class LoginController extends Controller
{
    public function actionIndex()
    {
        $errorMessage = null;
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $login = App::getInstance()->request->post('login');
            $password = App::getInstance()->request->post('password');
            $user = App::getInstance()->modelFactory->getOneByParam("User", "login", $login);

            if ($user && $user->getPassword() == (new Security())->getHash($password)) {
                App::getInstance()->session->setParam('user_id', $user->getId());
                App::getInstance()->session->setParam('user_login', $login);
                App::getInstance()->session->setParam('user_name', $user->getName());
                App::getInstance()->request->redirect('/account');
            } else {
                $errorMessage = "Указано неверное имя пользователя или пароль. Повторите ввод информации";
            }
        }
        echo $this->render('login', ['errorMessage' => $errorMessage]);
    }
}