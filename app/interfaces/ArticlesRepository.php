<?php

namespace app\interfaces;

interface ArticleRepository {
    public function getAll();
    public function getById($id);
    public function create($author, $category, $title, $image, $description, $comments);
    public function update($id, $author, $category, $title, $image, $description, $comments);
    public function delete($id);
}