<?php

namespace app\core;

class Controller
{
    protected View $view;
    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../views/');
    }

    protected function renderPage($title, $content = ""): void
    {
        $this->view->render('/layouts/main.php', [
            "title" => $title,
            "content" => $content
        ]);
    }
}