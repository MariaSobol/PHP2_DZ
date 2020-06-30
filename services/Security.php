<?php


namespace app\services;


class Security
{
    public function getHash($string) {
        return md5($string . "sd5gdf");
    }

}