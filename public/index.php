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
?>


<main>
    <div class="container">
        <h2 class="page-title">Все статьи</h2>
        <div class="articles">
            <div class="article-card">
                <div class="article-meta">
                    <div class="article-meta-item">Author</div>
                    <div class="article-meta-item">Category</div>
                    <div class="article-meta-item">Date add</div>
                </div>
                <h3><a href="">Article Title</a></h3>
                <img src="https://leaguefactions.files.wordpress.com/2017/05/2017-05-28-shurima-map-updated-shroom.png" alt="Article Image">
                <p>Short description of the article</p>
                <p>Comments: 5</p>
            </div>
        </div>
    </div>
</main>

<?php
require_once "../views/layouts/footer.php";
?>

</body>
</html>