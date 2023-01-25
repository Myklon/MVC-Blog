<?php

use Dotenv\Dotenv;
use app\core\Router;

require_once __DIR__ . "/../vendor/autoload.php";

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$router = new Router();
$router->run();