<?php


namespace app\controllers;


use app\models\ModelFactory;
use app\services\Request;
use app\services\Session;

class LoginController extends Controller
{
    public function actionIndex()
    {
        $errorMessage = null;
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $request = new Request();
            $session = new Session();
            $login = $request->post('login');
            $password = $request->post('password');
            $user = ModelFactory::getByParam("User", "login", $login);

            if ($user && $user->getPassword() == $request->getHash($password)) {
                $session->setParam('user_id', $user->getId());
                $session->setParam('user_login', $login);
                $session->setParam('user_name', $user->getName());
                $request->redirect('/?c=account');
            } else {
                $errorMessage = "Указано неверное имя пользователя или пароль. Повторите ввод информации";
            }
        }
        echo $this->render('login', ['errorMessage' => $errorMessage]);
    }
}