<?php

namespace app\interfaces\models;

interface ArticleRepository {
    public function getAll();
    public function getById($id);
    public function create();
    public function update($id);
    //     public function update($id, $author, $category, $title, $image, $synopsis, $description);
    public function delete($id);
}