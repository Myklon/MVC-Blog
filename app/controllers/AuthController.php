<?php

namespace app\controllers;

use app\core\Controller;

class AuthController extends Controller
{
    public function login()
    {
        $title = "Главная";
        $content = $this->view->prepareContent('/auth/login.php');
        $this->renderPage($title, $content);
    }
    public function registration()
    {
        $title = "Главная";
        $content = $this->view->prepareContent('/auth/registration.php');
        $this->renderPage($title, $content);
    }
}