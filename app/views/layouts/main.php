<?php
/**
 * @var string $title
 * @var string $content
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=$title?></title>
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>
<?php
require_once __DIR__ . "/../layouts/header.php";
require_once __DIR__ . "/../layouts/navigation.php";

echo $content;

require_once __DIR__ . "/../layouts/footer.php";
?>
</body>
</html>