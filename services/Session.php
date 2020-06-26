<?php


namespace app\services;


class Session
{
    protected function setSession(){
        if (is_null($_SESSION)){
            session_start();
        }
    }

    public function setParam($key, $value){
        $this->setSession();
        $_SESSION[$key] = $value;
    }

    public function getParam($key){
        $this->setSession();
        return $_SESSION[$key];
    }

    public function deleteParam($key){
        $this->setSession();
        unset($_SESSION[$key]);
    }

    public function deleteSession(){
        $this->setSession();
        foreach ($_SESSION as $key => $value){
            unset($_SESSION[$key]);
        }
        session_destroy();
    }
}