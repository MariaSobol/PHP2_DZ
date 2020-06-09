<?php

require $_SERVER['DOCUMENT_ROOT'] . "/../services/Autoloader.php";

spl_autoload_register([new Autoloader(), 'loadClass']);

$productP = new \models\PhysicalProduct("ProductP", "description", 1000);
$productD = new \models\DigitalProduct($productP);

var_dump($productP);
var_dump($productD);

echo $productP->getProfitFromQty(5);