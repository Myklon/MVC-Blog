<?php

namespace app\models;

use app\exceptions\PageNotFoundException;
use app\interfaces\models\ArticleRepository;
use app\interfaces\services\Database;
use app\services\Mysql;

class DBArticleRepository implements ArticleRepository
{
    private Database $database;
    public function __construct()
    {
        $this->database = new Mysql();
    }

    public function getAll(): array
    {
        # Не ищется обложка
        $sql = "SELECT `article_id`, articles.`create_date`, `title`,`synopsis`, categories.name AS category_name, users.login FROM `articles`
                JOIN categories ON articles.category_id = categories.category_id
                JOIN users ON articles.user_id = users.user_id";
        return $this->database->query($sql);
    }

    public function getById($id)
    {
        $sql = "SELECT `article_id`, articles.`create_date`, `title`,`synopsis`, articles.`description`, categories.name AS category_name, users.login FROM `articles`
                JOIN categories ON articles.category_id = categories.category_id
                JOIN users ON articles.user_id = users.user_id
                WHERE `article_id` = :id;";
        $params = [
            ':id' => $id
        ];
        $articles = $this->database->query($sql, $params);
        if(empty($articles)) throw new PageNotFoundException();
        return $articles;
    }

    public function create(): array
    {

    }

    public function update($id)
    {

    }

    public function delete($id)
    {

    }

    private function isValid(&$fields): bool
    {
        $errors = [];
        $rules = [
            "author" => [
                "minLength" => 2,
                "maxLength" => 20,
                "name" => "Автор"
            ],
            "category" => [
                "minLength" => 3,
                "maxLength" => 15,
                "name" => "Категория"
            ],
            "title" => [
                "minLength" => 5,
                "maxLength" => 120,
                "name" => "Название статьи"
            ],
            "image" => [
                "minLength" => 20,
                "maxLength" => 500,
                "name" => "Ссылка на обложку статьи"
            ],
            "synopsis" => [
                "minLength" => 5,
                "maxLength" => 200,
                "name" => "Краткое описание"
            ],
            "description" => [
                "minLength" => 10,
                "maxLength" => 10000,
                "name" => "Текст статьи"
            ],
        ];

        $fields = array_map(function ($value)
        {
            return trim($value);
        }, $fields);

        foreach($fields as $field => $value)
        {
            if(empty($value))
            {
                $errors[] = "Поле '{$rules[$field]["name"]}' не должно быть пустым";
                continue;
            }
            if(mb_strlen($value) < $rules[$field]["minLength"] && !empty($field))
            {
                $errors[] = "Поле '{$rules[$field]["name"]}' не должно быть меньше {$rules[$field]["minLength"]} символов";
                continue;
            }
            if(mb_strlen($value) > $rules[$field]["maxLength"])
            {
                $errors[] = "Поле '{$rules[$field]["name"]}' не должно быть больше {$rules[$field]["maxLength"]} символов";
            }
        }

        if(!empty($errors))
        {
            $fields = array_map(function ($value)
            {
                return htmlspecialchars($value);
            }, $fields);
            $fields["errors"] = $errors;
            return false;
        }
        return true;
    }
}