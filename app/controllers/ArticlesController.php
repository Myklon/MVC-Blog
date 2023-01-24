<?php

namespace app\controllers;

use app\interfaces\ArticleRepository;

class ArticlesController {
    public function index()
    {
        echo "Я главная страница со всеми статьями";
    }
    public function getArticle()
    {
        echo "Я страница статьи";
    }
    public function createArticle()
    {
        echo "Создание статьи";
    }
    public function createArticleSubmit()
    {
        echo "Подтверждение создания статьи";
    }
    public function editArticle()
    {
        echo "Я страница редактирования статьи";
        echo <<<FORM
    <form method="post"><button>Отредактировать</button></form>
FORM;
    }
    public function editArticleSubmit()
    {
        echo "Я подтверждение редактирования статьи";
    }
    public function deleteArticle()
    {
        echo "Я удаляю страницу";
    }
}