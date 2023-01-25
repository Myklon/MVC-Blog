<?php

namespace app\controllers;

use app\interfaces\ArticleRepository;
use app\models\ArrayArticleRepository;

class ArticlesController {
    private ArticleRepository $articles;

    public function __construct()
    {
        $this->articles = new ArrayArticleRepository();
    }

    public function index()
    {
        var_dump($this->articles->getAll());
    }
    public function getArticle($params)
    {
        $articleID = $params["id"];
        var_dump($this->articles->getById($articleID));
    }
    public function createArticle()
    {
        echo "Создание статьи";
    }
    public function createArticleSubmit()
    {
        echo "Подтверждение создания статьи";
    }
    public function editArticle($id)
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