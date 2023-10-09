<?php

use \App\Utils;
use \App\Config;

?>

<head>
    <link rel="stylesheet" href="<?= Config::$PATH_PUBLIC.'/css/login.css' ?>">
    <title>Pendu | Signup</title>
</head>

<div class="form-container">
    <h1>Signup</h1>
    <form method="POST" action="<?= $_SERVER['REQUEST_URI']?>">
        <input type="text" name="username" placeholder="username" required>
        <input type="password" name="password" placeholder="password" required>
        <input type="password" name="password2" placeholder="confirm" required>
        <input type="submit" value="Signup">
    </form>
    <a href="<?= Config::$url.'/public/?p=login' ?>">Déjà un compte? Connectez vous ici !</a>
</div>