<?php


namespace app\services;


class Request
{
    public function get(string $name)
    {
        return $_GET[$name];
    }

    public function post(string $name)
    {
        return $_POST[$name];
    }

    function getHash($string) {
        return md5($string . "sd5gdf");
    }

    function redirect(string $url): void
    {
        header("Location: {$url}");
        exit;
    }
}