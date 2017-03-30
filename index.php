<?php
session_start();
require 'vendor/autoload.php';

use MyApp\components\ESHelper;

if(!defined('JSON_PRESERVE_ZERO_FRACTION'))
{
    define('JSON_PRESERVE_ZERO_FRACTION', 1024);
}

$logger = new \Flynsarmy\SlimMonolog\Log\MonologWriter(array(
    'handlers' => array(
        new \Monolog\Handler\StreamHandler('./logs/'.date('Y-m-d').'.log'),
    ),
));

$app = new \MyApp\Slim([
    'log.enabled' => true,
    'log.level' => \Slim\Log::DEBUG,
    'log.writer' => $logger
]);

$app->setName("Slim2 app");

$loader = new Twig_Loader_Filesystem('api/views');
$twig = new Twig_Environment($loader, array(
    'debug' => true,
    /*'cache' => 'cache'*/));
$twig->addExtension(new Twig_Extension_Debug());
$app->baseUrl = 'http://app2.ankur.misport.com';
$app->twig = $twig;

$app->hook("slim.before.router",function() use ($app){
   \MyApp\APIRoutes::getControllerInstance();
});

$app->hook('slim.after', function() use ($app){
    $es = new ESHelper();
    $es->setIndex(ESHelper::DEFAULT_INDEX)
        ->setType(ESHelper::DEFAULT_TYPE)
        ->set('request_uri', $_SERVER['REQUEST_URI'])
        ->set('request_method', $_SERVER['REQUEST_METHOD'])
        ->set('response_status', $app->response()->getStatus())
        ->set('response_length', $app->response()->getLength())
        ->set('ip', $_SERVER['REMOTE_ADDR'])
        ->set('host', $_SERVER['HTTP_HOST'])
        ->set('action', $_SERVER['HTTP_USER_AGENT'])
        ->set('timestamp', date('Y-m-d H:i:s'))
        ->save();
    ;
});


$app->run();

function pre($array,$flag=true) {
    echo "<pre>";
    print_r($array);
    if($flag) {
        die;
    }
}