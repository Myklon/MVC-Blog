<main>
    <div class="container">
        <h2 class="page-title">Все статьи</h2>
        <div class="button-wrapper">
            <a href="articles/new" class="create-btn">Добавить статью</a>
        </div>
        <div class="articles">
            <?php
            if (isset($articles)) :
                foreach($articles as $article) : ?>
            <div class="article-card">
                <div class="article-meta">
                    <div class="article-meta-item">🎩 <a href=""><?=$article['login']?></a></div>
                    <div class="article-meta-item">💻 <a href=""><?=$article['category_name']?></a></div>
                    <div class="article-meta-item">📅 <?=$article['create_date']?></div>
                </div>
                <hr class="article">
                <h3><a href="/articles/<?=$article['article_id']?>"><?=$article['title']?></a></h3>
                <p><?=$article['synopsis']?></p>
                <?php if (isset($article["image"])):?>
                <img src="<?=$article['image']?>" alt="Article Image">
                <?php endif;?>
            </div>
        <?php endforeach; endif; ?>
        </div>
    </div>
</main>