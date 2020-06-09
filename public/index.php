<?php

require $_SERVER['DOCUMENT_ROOT'] . "/../services/Autoloader.php";

spl_autoload_register([new Autoloader(), 'loadClass']);

//$product = new \models\Product;
//
//var_dump($product);