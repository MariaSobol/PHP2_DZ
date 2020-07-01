<?php


namespace app\services;


class Session
{
    public function __construct()
    {
        session_start();
    }

    public function setParam($key, $value){
        $_SESSION[$key] = $value;
    }

    public function getParam($key){
        return $_SESSION[$key];
    }

    public function deleteParam($key){
        unset($_SESSION[$key]);
    }

    public function deleteSession(){
        foreach ($_SESSION as $key => $value){
            unset($_SESSION[$key]);
        }
        session_destroy();
    }
}