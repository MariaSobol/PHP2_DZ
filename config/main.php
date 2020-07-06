<?php
return [
    'rootDir' => __DIR__ . "/../",
    'viewsDir' => __DIR__ . "/../views/",
    'imagesDir' => __DIR__ . "/../public/img/",
    'defaultController' => 'product',
    'controllerNamespace' => 'app\controllers\\',
    'components' => [
        'connection' => [
            'class' => \app\services\Db::class,
            'driver' => 'mysql',
            'host' => '192.168.1.64',
            'login' => 'root',
            'password' => '150485',
            'dbname' => 'shop_june',
            'charset' => 'utf8',
        ],
        'request' => [
            'class' => \app\services\Request::class,
        ],
        'session' => [
            'class' => \app\services\Session::class
        ],
        'renderer' => [
            'class' => \app\services\renderers\TemplateRenderer::class
        ],
        'modelFactory' => [
            'class' => \app\models\records\ModelFactory::class
        ]
    ]
];