<?php

namespace app\core;

use app\services\Helper;

class Route
{
    private string $pattern;
    private string $requestMethod;
    private string $controller;
    private string $action;
    private array $namedParameters = [];
    public function __construct($pattern, $requestMethod, $controller, $action)
    {
        $this->pattern = $pattern;
        $this->requestMethod = $requestMethod;
        $this->controller = $controller;
        $this->action = $action;
    }
    public function match($url, $requestMethod): bool
    {
        return preg_match($this->pattern, $url, $this->namedParameters) && $this->requestMethod === $requestMethod;
    }
    public function handle(): void
    {
        $controller = new $this->controller();
        $action = $this->action;
        Helper::cleanParametersArray($this->namedParameters);
        $controller->$action($this->namedParameters);
    }
}