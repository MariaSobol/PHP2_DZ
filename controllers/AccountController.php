<?php


namespace app\controllers;


use app\services\Request;
use app\services\Session;

class AccountController extends Controller
{
    public function actionIndex()
    {

        $session = new Session();
        $request = new Request();

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if($request->post('logout')){
                $session->deleteSession();
            }
        }

        if ($login = $session->getParam('user_login')) {
            $userName = $session->getParam('user_name');
            echo $this->render('account', ['login' => $login, 'userName' => $userName]);
        }else {
            $request->redirect('/?c=login');
        }
    }
}