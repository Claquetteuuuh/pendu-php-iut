<!DOCTYPE html>
<html lang="en">
<?php

use App\config;
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendu</title>
    <link rel="stylesheet" href="<?= config::$PATH_PUBLIC . 'css/global.css' ?>">
</head>

<body>
    <?= $content;?>
</body>

</html>