<?php ?>
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
        <h2 class="page-title">Регистрация</h2>
        <form>
            <div class="form-group">
                <label for="nickname">Логин</label>
                <input type="text" class="form-control" id="nickname" required>
            </div>
            <div class="form-group">
                <label for="email">Почта</label>
                <input type="email" class="form-control" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" class="form-control" id="password" required>
            </div>
            <div class="form-group">
                <label for="repeat-password">Повторите пароль</label>
                <input type="password" class="form-control" id="repeat-password" required>
            </div>
            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
        </form>
    </div>
</main>

<?php
require_once "../views/layouts/footer.php";
?>

</body>
</html>