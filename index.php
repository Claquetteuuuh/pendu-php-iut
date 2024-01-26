<?php

require ("./app/Autoloader.php");
use \App\Autoloader as Autoloader;
use App\Config;

Autoloader::register();

header("Location: " . Config::$url . "/public/index.php");



?>