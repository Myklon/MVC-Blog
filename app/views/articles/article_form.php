<?php
/** @var string $headline */
/** @var string $buttonName */
/** @var array $fields */
?>

<main>
    <div class="container">
        <h2 class="page-title"><?=$headline?></h2>
        <form method="post">
            <?php
            if(isset($fields["errors"])): ?>
            <div class="error-container">
            <ul>
                <?php
                foreach($fields["errors"] as $error):
                    echo "<li class='error'>$error</li>";
                endforeach; ?>
            </ul>
            </div>
            <?php
            endif; ?>
            <div class="form-group">
                <label for="author">Автор:</label>
                <input type="text" id="author" name="author" class="form-control" value="<?=$fields["author"] ?? "" ?>">
            </div>
            <div class="form-group">
                <label for="category">Категория:</label>
                <input type="text" id="category" name="category" class="form-control" value="<?=$fields["category"] ?? "" ?>">
            </div>
            <div class="form-group">
                <label for="title">Название статьи:</label>
                <input type="text" id="title" name="title" class="form-control" value="<?=$fields["title"] ?? "" ?>">
            </div>
            <div class="form-group">
                <label for="image">Ссылка на обложку статьи: (https://kartinkin.net/uploads/posts/2021-07/1627090751_25-kartinkin-com-p-paren-smotrit-v-okno-art-art-krasivo-25.jpg)</label>
                <input type="text" id="image" name="image" value="<?=$fields["image"] ?? "" ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="synopsis">Краткое описание:</label>
                <textarea id="synopsis" name="synopsis" class="form-control" rows="3"><?= $fields["synopsis"] ?? "" ?></textarea>
            </div>
            <div class="form-group">
                <label for="description">Текст статьи:</label>
                <textarea id="description" name="description" class="form-control" rows="15"><?= $fields["description"] ?? "" ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary"><?=$buttonName?></button>
        </form>
    </div>
</main>