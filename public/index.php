<?php

require ("../app/Autoloader.php");
use \App\Autoloader as Autoloader;
Autoloader::register();

if(isset($_GET['p'])){
    $p = $_GET["p"];
}else{
    $p = "home";
}

// DB


ob_start();
if($p === "home"){
    require '../app/pages/Home.php';
}

$content = ob_get_clean();

require '../app/pages/templates/Layout.php'

?>