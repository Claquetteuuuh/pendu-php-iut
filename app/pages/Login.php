<?php

use \App\Utils;
use \App\Config;

?>

<head>
    <link rel="stylesheet" href="<?= Config::$PATH_PUBLIC.'/css/login.css' ?>">
    <title>Pendu | Login</title>
</head>

<div class="form-container">
    <h1>Login</h1>
    <form method="POST" action="<?= $_SERVER['REQUEST_URI']?>">
        <input type="text" name="username" placeholder="username" required>
        <input type="password" name="password" placeholder="password" required>
        <input type="submit" value="Login">
    </form>
    <a href="<?= Config::$url.'/public/?p=signup' ?>">Pas de compte? Enregistrez vous ici !</a>
</div>