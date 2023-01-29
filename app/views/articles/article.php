<main>
    <div class="container" >
        <div class="article">
            <?php
            /** @var array $article */
            /** @var int $id */
            echo <<<ARTICLE
            <div class="article-card">
                <div class="nav-items">
                <div class="article-meta">
                    <div class="article-meta-item">🎩 <a href="">{$article['author']}</a></div>
                    <div class="article-meta-item">💻 <a href="">{$article['category']}</a></div>
                    <div class="article-meta-item">📅 {$article['dateAdd']}</div>
                </div>
                <div class="control-btn-wrapper">
                    <a href="/articles/{$id}/edit" class="edit-btn">Редактировать</a>
                    <a href="/articles/{$id}/delete" class="delete-btn">Удалить</a>
                </div>
                </div>
                <hr class="article">
                <h3><a href="/articles/{$id}">{$article['title']}</a></h3>
                <p>{$article['synopsis']}</p>
                <img src="{$article['image']}" alt="Article Image">
                <p class="article-content">{$article['description']}</p>
            </div>
        </div>
        ARTICLE; ?>
    </div>
</main>