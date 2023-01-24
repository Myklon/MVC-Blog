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

var_dump($_SERVER);
?>

<main>
    <div class="container">
        <h2 class="page-title">Вход</h2>
        <form method="post">
            <div class="form-group">
                <label for="email">Почта</label>
                <input type="email" class="form-control" id="email" >
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" class="form-control" id="password" >
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>
    </div>
</main>

<?php
require_once "../views/layouts/footer.php";
?>

</body>
</html>