<?php

use App\config;

    foreach ($vars as $key => $value) {
        $mot = $value->getMots();
        $erreurs = $value->getErreurs();
        $result = $value->getResult();
        $id_partie = $value->getId_partie();
        echo "<div>";
        echo "<p>$id_partie</p>";
        echo "<p>$mot</p>";
        echo "<p>$erreurs</p>";
        echo "<p>$result</p>";
        echo "</div>";
        echo "</br>";
    }

?>

<a href="<?= config::$url. '/public/?p=play'?>">New game</a>