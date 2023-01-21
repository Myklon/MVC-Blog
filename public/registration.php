<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>

<header>
    <div class="header-content">
        <h1>MVC Blog 0.01</h1>
    </div>
</header>
<nav class="full-width-nav">
    <div class="container">
        <div class="nav-items">
            <div class="left-nav">
                <a href="#">Главная</a>
                <a href="#">Статьи</a>
            </div>
            <div class="right-nav">
                <a href="#">Войти</a>
                <a href="#">Регистрация</a>
            </div>
        </div>
    </div>
</nav>

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

<footer class="page-footer">
    <div class="container">
        <p>©2023 MVC Blog</p>
    </div>
</footer>

</body>
</html>