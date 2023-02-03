<?php

namespace app\controllers;

use app\core\Controller;

class ExceptionsController extends Controller
{
    public function handler404()
    {
        header("HTTP/1.0 404 Not Found");
        $code = 404;
        $title = "Ошибка 404";
        $headline = "Страница не найдена";
        $message = "Скорее всего, ты попал сюда из-за очепятки в адресе страницы";
        $vars = [
            "code" => $code,
            "headline" => $headline,
            "message" => $message
            ];
        $this->handler($title, $vars);
    }

    public function handler403()
    {

    }

    public function handler($title, $vars)
    {
        $content = $this->view->prepareContent("/errors/index.php", $vars);
        $this->renderPage($title, $content);
    }
}