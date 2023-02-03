<?php

namespace app\controllers;

use app\core\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $title = "Профиль";
        $content = $this->view->prepareContent('/profile/index.php');
        $this->renderPage($title, $content);
    }
}