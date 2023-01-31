<?php

namespace app\core;

use app\controllers\ArticlesController;
use app\controllers\AuthController;
use app\controllers\CategoriesController;
use app\controllers\ProfileController;
use app\exceptions\PageNotFoundException;
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

    /**
     * @throws PageNotFoundException
     */
    public function run()
    {
        foreach ($this->routes as $route) {
            if ($route->match($this->url, $this->requestMethod)) {
                $route->handle();
                return;
            }
        }
        throw new PageNotFoundException('Page not found', 404);
    }

    private function preparedRoutes(): void
    {
        # Пути статей
        $this->addRoute("~^/$~", "GET", ArticlesController::class, 'index');
        $this->addRoute("~^/articles$~", "GET", ArticlesController::class, 'index');
        $this->addRoute("~^/articles/(?P<id>\d+)$~", "GET", ArticlesController::class, 'getArticle');
        $this->addRoute("~^/articles/new$~", "GET", ArticlesController::class, 'createArticle');
        $this->addRoute("~^/articles/new$~", "POST", ArticlesController::class, 'createArticleSubmit');
        $this->addRoute("~^/articles/(?P<id>\d+)/edit$~", "GET", ArticlesController::class, 'editArticle');
        $this->addRoute("~^/articles/(?P<id>\d+)/edit$~", "POST", ArticlesController::class, 'editArticleSubmit');
        $this->addRoute("~^/articles/(?P<id>\d+)/delete$~", "GET", ArticlesController::class, 'deleteArticle');

        # Пути категорий
        $this->addRoute("~^/categories$~", "GET", CategoriesController::class, 'index');

        # Пути профиля
        $this->addRoute("~^/profile$~", "GET", ProfileController::class, 'index');

        # Пути логина и регистрации
        $this->addRoute("~^/login$~", "GET", AuthController::class, 'login');
        $this->addRoute("~^/registration$~", "GET", AuthController::class, 'registration');
    }
}