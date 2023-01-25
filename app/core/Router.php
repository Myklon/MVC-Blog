<?php

namespace app\core;

use app\controllers\ArticlesController;
use app\services\Helper;

class Router
{
    private string $url;
    private string $requestMethod;
    private array $routes = [];

    public function __construct()
    {
        $this->url           = Helper::getUrlWithoutQueryString();
        $this->requestMethod = $_SERVER["REQUEST_METHOD"];
        $this->preparedRoutes();
    }

    public function addRoute($pattern, $requestMethod, $controllerName, $action): void
    {
        $this->routes[] = new Route($pattern, $requestMethod, $controllerName, $action);
    }

    public function run()
    {
        foreach ($this->routes as $route) {
            if ($route->match($this->url, $this->requestMethod)) {
                $route->handle();
                return;
            }
        }
        header("HTTP/1.0 404 Not Found");
        throw new \Exception('Page not found', 404);
    }

    private function preparedRoutes(): void
    {
        $this->addRoute("~^/$~", "GET", ArticlesController::class, 'index');
        $this->addRoute("~^/articles$~", "GET", ArticlesController::class, 'index');
        $this->addRoute("~^/articles/(?P<id>\d+)$~", "GET", ArticlesController::class, 'getArticle');
        $this->addRoute("~^/articles/new$~", "GET", ArticlesController::class, 'createArticle');
        $this->addRoute("~^/articles/new$~", "POST", ArticlesController::class, 'createArticleSubmit');
        $this->addRoute("~^/articles/(?P<id>\d+)/edit$~", "GET", ArticlesController::class, 'editArticle');
        $this->addRoute("~^/articles/(?P<id>\d+)/edit$~", "POST", ArticlesController::class, 'editArticleSubmit');
        $this->addRoute("~^/articles/(?P<id>\d+)/delete$~", "POST", ArticlesController::class, 'deleteArticle');
    }
}