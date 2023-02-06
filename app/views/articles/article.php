<?php
/** @var array $article */
/** @var int $id */
?>

<main>
    <div class="container" >
        <div class="article">
            <div class="article-card">
                <div class="nav-items">
                <div class="article-meta">
                    <div class="article-meta-item">🎩 <a href=""><?=$article['login']?></a></div>
                    <div class="article-meta-item">💻 <a href=""><?=$article['category_name']?></a></div>
                    <div class="article-meta-item">📅 <?=$article['create_date']?></div>
                </div>
                <div class="control-btn-wrapper">
                    <a href="/articles/<?=$article['article_id']?>/edit" class="edit-btn">Редактировать</a>
                    <a href="/articles/<?=$article['article_id']?>/delete" class="delete-btn">Удалить</a>
                </div>
                </div>
                <hr class="article">
                <h3><a href="/articles/<?=$article['article_id']?>"><?=$article['title']?></a></h3>
                <p><?=$article['synopsis']?></p>
                <?php if (isset($article["image"])):?>
                    <img src="<?=$article['image']?>" alt="Article Image">
                <?php endif;?>
                <p class="article-content"><?=nl2br($article["description"])?></p>
            </div>
        </div>
    </div>
</main>