<?php

require $_SERVER['DOCUMENT_ROOT'] . "/../config/main.php";
require ROOT_DIR . "services/Autoloader.php";

spl_autoload_register([new app\services\Autoloader(), 'loadClass']);

$user = (new \app\models\User())->getById(5);
$user->setLogin("Matt");

var_dump($user->updateInDb());


