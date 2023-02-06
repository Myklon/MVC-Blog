<?php

namespace app\models;

use app\exceptions\PageNotFoundException;
use app\interfaces\models\ArticleRepository;

class ArrayArticleRepository implements ArticleRepository
{
    private string $path;
    public function __construct()
    {
        $this->path = dirname(__DIR__, 2) . "/db/articles.json";
    }

    public function getAll(): array
    {
        return $this->readArticles();
    }

    public function getById($id)
    {
        $articles = $this->readArticles();
        if(isset($articles[$id])) {
            return $articles[$id];
        }
        else {
           throw new PageNotFoundException();
        }
    }

    public function create(): array
    {
        $fields = [
            "author" => $_POST['author'],
            "category" => $_POST['category'],
            "title" => $_POST['title'],
            "image" => $_POST['image'],
            "synopsis" => $_POST['synopsis'],
            "description" => $_POST['description']
        ];

        $isValid = $this->isValid($fields);
//        var_dump($fields);
        if(!$isValid)
        {
            return $fields;
        }

        $fields["dateAdd"] = date("Y-m-d H:i");

        $articles = $this->readArticles();
        $new_id = $this->getNewId($articles);

        $articles[$new_id] = $fields;

        $this->encodeJSON($articles);
        $message["id"] = $new_id;
        return $message;
    }

    public function update($id)
    {
        $fields = [
            "author" => $_POST['author'],
            "category" => $_POST['category'],
            "title" => $_POST['title'],
            "image" => $_POST['image'],
            "synopsis" => $_POST['synopsis'],
            "description" => $_POST['description']
        ];

        $isValid = $this->isValid($fields);
        if(!$isValid)
        {
            return $fields;
        }

        $articles = $this->readArticles();
        if (isset($articles[$id])) {
            $articles[$id]['author'] = $fields["author"];
            $articles[$id]['category'] = $fields["category"];
            $articles[$id]['title'] = $fields["title"];
            $articles[$id]['image'] = $fields["image"];
            $articles[$id]['synopsis'] = $fields["synopsis"];
            $articles[$id]['description'] = $fields["description"];
            $this->encodeJSON($articles);
        }
        else {
            throw new PageNotFoundException();
        }
    }

    public function delete($id)
    {
        $articles = $this->readArticles();
        if(isset($articles[$id])) {
            unset($articles[$id]);
            $this->encodeJSON($articles);
        }
        else {
            throw new \Exception("Такой статьи нет");
        }
    }
    private function readArticles() {
        $json = file_get_contents($this->path);
        $articles = json_decode($json, true);
        krsort($articles);
        return $articles;
    }
    private function encodeJSON($articles)
    {
        $json = json_encode($articles);
        file_put_contents($this->path, $json);
    }
    private function getNewId($articles) {
        if (empty($articles)) {
            return 1;
        }
        $max_id = max(array_keys($articles));
        return $max_id + 1;
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