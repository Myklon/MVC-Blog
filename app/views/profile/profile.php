<?php

?>
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
    <div class="container" style="padding-top: 30px;">
        <div class="profile-header">
            <div class="left-section">
                <img src="https://shapka-youtube.ru/wp-content/uploads/2020/08/man-silhouette.jpg" alt="Profile Picture">
                <button>Change avatar</button>
            </div>
            <div class="right-section">
                <h1>John Doe</h1>
                <div class="profile-content">
                    <p>Дата регистрации: ХХ.ХХ.ХХХХ</p>
                    <p>Количество постов: 0</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor, magna a faucibus commodo, ipsum velit dictum magna, non ullamcorper erat velit id purus.</p>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
require_once "../views/layouts/footer.php";
?>

</body>
</html>