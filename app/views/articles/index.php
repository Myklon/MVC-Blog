<main>
    <div class="container">
        <h2 class="page-title">Все статьи</h2>
        <div class="button-wrapper">
            <a href="articles/new" class="create-btn">Добавить статью</a>
        </div>
        <div class="articles">
            <?php
            if (isset($articles)) {
                foreach($articles as $id => $article) {
                    echo <<<ARTICLES
            <div class="article-card">
                <div class="article-meta">
                    <div class="article-meta-item">🎩 <a href="">{$article['author']} </a></div>
                    <div class="article-meta-item">💻 <a href="">{$article['category']}</a></div>
                    <div class="article-meta-item">📅 {$article['dateAdd']}</div>
                </div>
                <hr class="article">
                <h3><a href="/articles/{$id}">{$article['title']}</a></h3>
                <p>{$article['synopsis']}</p>
                <img src={$article['image']} alt="Article Image">
            </div>
ARTICLES;
                }
            } ?>
        </div>
    </div>
</main>