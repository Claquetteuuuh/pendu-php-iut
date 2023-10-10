<?php

require ("../app/Autoloader.php");
use \App\Autoloader as Autoloader;
use App\config;

Autoloader::register();

if(isset($_GET['p'])){
    $p = $_GET["p"];
}else{
    $p = "home";
}

session_name("game_launched");
session_start();


ob_start();
if($p === "home"){
    $controller = new \App\Controllers\PartieController;
    $controller->index();
}
else if($p === "login"){
    $controller = new \App\Controllers\AccountController;
    $controller->login();
}
else if($p === "signup"){
    $controller = new \App\Controllers\AccountController;
    $controller->signup();
}
else if($p === "play"){
    $controller = new \App\Controllers\PartieController;
    $controller->play();
}
else if($p === "logout"){
    $controller = new \App\Controllers\AccountController;
    $controller->logout();
}
else{
    $controller = new \App\Controllers\PartieController;
    $controller->index();
}
$content = ob_get_clean();

require '../app/pages/templates/Layout.php'

?>