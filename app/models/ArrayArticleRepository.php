<?php

namespace app\models;

use app\interfaces\ArticleRepository;

class ArrayArticlesRepository implements ArticleRepository
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
            echo "Error: article with id " . $id . " not found.";
        }
    }

    public function create($author, $category, $title, $image, $description, $comments)
    {
        $articles = $this->readArticles();
        $new_id = $this->getNewId($articles);
        $dateAdd = date("Y-m-d H:i:s");

        $new_article = array(
            "author" => $author,
            "category" => $category,
            "dateAdd" => $dateAdd,
            "title" => $title,
            "image" => $image,
            "description" => $description,
            "comments" => $comments
        );

        $articles[$new_id] = $new_article;

        $this->encodeJSON($articles);
    }

    public function update($id, $author, $category, $title, $image, $description, $comments)
    {
        $articles = $this->readArticles();
        if (isset($articles[$id])) {
            $articles[$id]['author'] = $author;
            $articles[$id]['category'] = $category;
            $articles[$id]['title'] = $title;
            $articles[$id]['image'] = $image;
            $articles[$id]['description'] = $description;
            $articles[$id]['comments'] = $comments;
            $this->encodeJSON($articles);
        }
        else {
            echo "Error: article with id " . $id . " not found.";
        }
    }

    public function delete($id)
    {
        if(isset($this->decodedJson[$id])) {
            unset($this->decodedJson[$id]);
            $this->encodeJSON($this->decodedJson);
        }
        else {
            echo "Error: article with id " . $id . " not found.";
        }
    }
    private function readArticles() {
        $json = file_get_contents($this->path);
        return json_decode($json, true);
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
}