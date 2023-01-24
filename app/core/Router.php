<?php

namespace app\core;

use app\controllers\ArticlesController;

class Router
{
    private string $request;
    private array $rules = [];
    public function __construct($request)
    {
        $this->request = $request;
        $this->preparedRoutes();
    }
    public function addRule($pattern, $requestMethod, $controllerName, $action): void
    {
        $this->rules[$pattern][$requestMethod] = [$controllerName, $action];
    }

    public function run()
    {
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $rule = $this->findMatchedRule($requestMethod);

        if(!$rule)
        {
            header("HTTP/1.0 404 Not Found");
            throw new \Exception('Page not found', 404);
        }

        $controllerName = $rule[0];
        $actionName = $rule[1];

        $controller = new $controllerName();
        $controller->$actionName();
    }

    private function preparedRoutes(): void
    {
        # TODO
        # Возможно в index.php это не нужно. htmlEntities($_SERVER["REQUEST_URI"], ENT_QUOTES) ?? "/";
        # Добавить поддержку query запросов (или просто вырезать их из URI при роутинге)
        # Разобраться нужен слеш в конце адреса или нет (каноничные ссылки и /htaccess)
        $this->addRule("~^/$~", "GET", ArticlesController::class, 'index');
        $this->addRule("~^/article/(\d+)$~", "GET", ArticlesController::class, 'getArticle');
        $this->addRule("~^/article/new/$~", "GET", ArticlesController::class, 'createArticle');
        $this->addRule("~^/article/new/$~", "POST", ArticlesController::class, 'createArticle');
        $this->addRule("~^/article/(\d+)/edit$~", "GET", ArticlesController::class, 'editArticle');
        $this->addRule("~^/article/(\d+)/edit$~", "POST", ArticlesController::class, 'editArticleSubmit');
        $this->addRule("~^/article/(\d+)/delete$~", "POST", ArticlesController::class, 'deleteArticle');
    }

    private function findMatchedRule($requestMethod)
    {
        foreach($this->rules as $pattern => $method)
        {
            if(preg_match($pattern, $this->request)) {
                return $this->rules[$pattern][$requestMethod] ?? null;
            }
        }
        return false;
    }
}