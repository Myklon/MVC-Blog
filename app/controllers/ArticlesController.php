<?php

namespace app\controllers;

use app\core\Controller;
use app\interfaces\ArticleRepository;
use app\models\ArrayArticleRepository;

class ArticlesController extends Controller {
    private ArticleRepository $articles;

    public function __construct()
    {
        parent::__construct();
        $this->articles = new ArrayArticleRepository();
    }

    public function index()
    {
        $title = "Главная";
        $articles = $this->articles->getAll();
        $content = $this->view->prepareContent('/articles/index.php', ['articles' => $articles]);
        $this->renderPage($title, $content);
    }
    public function getArticle($params)
    {
        $articleID = $params["id"];
        $article = $this->articles->getById($articleID);
        $content = $this->view->prepareContent('/articles/article.php', [
            'id' => $articleID,
            'article' => $article
        ]);
        $title = $article['title'] . " / Статьи";
        $this->renderPage($title, $content);
    }
    public function createArticle($fields)
    {
        $title = "Создание статьи";
        $headline = "Создание статьи";
        $buttonName = "Добавить";
        $content = $this->view->prepareContent('/articles/article_form.php', [
            'fields' => $fields ?? null,
            'headline' => $headline,
            'buttonName' => $buttonName
        ]);
        $this->renderPage($title, $content);
    }
    public function createArticleSubmit()
    {
        $fields = $this->articles->create();
        if(!empty($fields["errors"]))
        {
           $this->createArticle($fields);
        }
        else
        {
            header('Location: /articles/' . $fields["id"], true, 302);
            exit();
        }
    }
    public function editArticle($fields)
    {

        if(key_exists('0', $fields))
        {
            $articleID = $fields["id"];
            $article = $this->articles->getById($articleID);
        }

        $title = "Редактирование статьи";
        $headline = "Редактирование статьи";
        $buttonName = "Отредактировать";

        $content = $this->view->prepareContent('/articles/article_form.php', [
            'headline' => $headline,
            'buttonName' => $buttonName,
            'fields' => $article ?? $fields
        ]);
        $this->renderPage($title, $content);
    }
    public function editArticleSubmit($params)
    {
        $fields = $this->articles->update($params["id"]);
        if(!empty($fields["errors"]))
        {
            $this->editArticle($fields);
        }
        else
        {
            header('Location: /articles/' . $params["id"], true, 302);
            exit();
        }
    }
    public function deleteArticle($params)
    {
        $articleID = $params["id"];
        $this->articles->delete($articleID);
        header('Location: /', true, 302);
    }
}