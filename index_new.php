<?php
require 'vendor/autoload.php';

$logger = new \Flynsarmy\SlimMonolog\Log\MonologWriter(array(
    'handlers' => array(
        new \Monolog\Handler\StreamHandler('./logs/'.date('Y-m-d').'.log'),
    ),
));

$slim = new \Slim\Slim();
// LazyControllerConnector needs a Slim instance
$connector = new \Rgsone\Slim\LazyControllerConnector( $slim );

$connector->connect( 'GET', '/test/read/:id', '\MyApp\controllers\TestController:test',[
    $connector->callAction('\MyApp\controllers\TestController','checkAccess',['Hi']),
    $connector->callAction('\MyApp\controllers\TestController','validate',[\MyApp\request\TestRequest::anotherRules()])
]);

// anothers examples
$connector->connectRoutes(
    // controller name
    '\MyApp\controllers\DemoController',
    // route list
    [
        '/demo/read/:id'=>[
            'action' => 'read',
            'method' => 'GET|POST',
            // names this route
            'name' => 'read only',
            // middlewares accepts any callable
            'middlewares' => [
                $connector->callAction('\MyApp\controllers\DemoController','validate',[\MyApp\request\TestRequest::anotherRules()])
            ]
        ],
        '/demo/do'=>[
            'action'=>'dos',
            'method' => 'GET|POST',
        ]
    ],
    // Global middlewares
    $connector->callAction('\MyApp\controllers\DemoController','checkAccess',['Hi']),
    $connector->callAction('\MyApp\controllers\DemoController','authAccess',['auth'])
);


/*$connector->connect( 'GET', '/demo/read/:id', '\MyApp\controllers\DemoController:read',[
    $connector->callAction('\MyApp\controllers\DemoController','validate',[\MyApp\request\TestRequest::anotherRules()])
]);*/




$slim->run();

function pre($array) {
    echo "<pre>";
    print_r($array);
    die;
}