<?php

namespace app\controllers;

use app\core\Controller;

class CategoriesController extends Controller
{
    public function index()
    {
        $title = "Все категории";
        $content = $this->view->prepareContent('/categories/index.php');
        $this->renderPage($title, $content);
    }
}