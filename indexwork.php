<?php
require 'vendor/autoload.php';

$logger = new \Flynsarmy\SlimMonolog\Log\MonologWriter(array(
    'handlers' => array(
        new \Monolog\Handler\StreamHandler('./logs/'.date('Y-m-d').'.log'),
    ),
));

$app = new \Slim\Slim([
    'log.enabled' => true,
    'log.level' => \Slim\Log::DEBUG,
    'log.writer' => $logger
]);

$app->setName("Slim2 app");

$app->hook("slim.before.router",function() use ($app){
    $app = \MyApp\APIRoutes::getInstance($app);
    $app->getControllerInstance();

/*    pre($app->request()->getPathInfo(),0);
    $parts = explode("/",$app->request()->getPathInfo());
    pre($parts);
    if (strpos($app->request()->getPathInfo(), "/article") === 0) {
        new \MyApp\controllers\ArticleController($app);
    } elseif (strpos($app->request()->getPathInfo(), "/test") === 0) {
        new \MyApp\controllers\TestController2($app);
    }*/
});
//pre(89);
//new \MyApp\controllers\ArticleController($app);

/*$app->post('/create',function(){
    pre('8989898');
});*/
$app->run();

function pre($array,$flag=true) {
    echo "<pre>";
    print_r($array);
    if($flag) {
        die;
    }
}