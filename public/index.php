<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>

<?php
require_once "../views/layouts/header.php";
require_once "../views/layouts/navigation.php";

require_once "../db/articles.php"
?>

<main>
    <div class="container">
        <h2 class="page-title">Все статьи</h2>
        <div class="articles">
            <?php
            if (isset($articles)) {
                foreach($articles as $article) {
                    echo   <<<ARTICLE
            <div class="article-card">
                <div class="article-meta">
                    <div class="article-meta-item">{$article['author']}</div>
                    <div class="article-meta-item">{$article['category']}</div>
                    <div class="article-meta-item">{$article['dateAdd']}</div>
                </div>
                <h3><a href="">{$article['title']}</a></h3>
                <img src={$article['image']} alt="Article Image">
                <p>{$article['description']}</p>
                <p>Comments: {$article['comments']}</p>
            </div>
ARTICLE;
                }
            } ?>
        </div>
    </div>
</main>

<?php
require_once "../views/layouts/footer.php";
?>

</body>
</html>