<?php

use app\core\Router;
use Dotenv\Dotenv;

require_once __DIR__ . "/../vendor/autoload.php";

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$route = htmlEntities($_SERVER["REQUEST_URI"], ENT_QUOTES) ?? "/";
$router = new Router($route);
$router->run();