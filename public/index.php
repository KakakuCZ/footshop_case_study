<?php

use App\Log;
use Monolog\Logger;

require __DIR__ . '/../config/config.php';
require __DIR__ . '/../vendor/autoload.php';

$loader = new Twig_Loader_Filesystem(__DIR__ . '/../templates');
$twig = new Twig_Environment($loader);

$loggerFactory = new \App\Model\Logging\LoggerFactory();
Log::$instance = $loggerFactory->createLogger(
    'appLogger',
    'main.log',
    Logger::DEBUG
)->getLoggerInstance();

//Too lazy to create DI container
$router = new \App\Model\Routing\Router($twig);
$router->navigate($_GET['type']);

