<?php

use app\controllers\ExceptionsController;
use app\exceptions\PageNotFoundException;
use Dotenv\Dotenv;
use app\core\Router;

require_once __DIR__ . "/../vendor/autoload.php";


$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
//var_dump($_SERVER);

$router = new Router();
try {
    $router->run();
} catch (PageNotFoundException $e) {
    (new ExceptionsController())->handler404();
}
