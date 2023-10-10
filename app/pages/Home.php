<?php
use App\config;

?>

<head>
    <link rel="stylesheet" href="<?= config::$PATH_PUBLIC . 'css/home.css' ?>">
</head>

<div class="partie-container">
    <h1>Historique</h1>
    <?php

    foreach ($vars as $key => $value) {
        $mot = $value->getMots();
        $erreurs = $value->getErreurs();
        $result = $value->getResult();
        $id_partie = $value->getId_partie();
        if ($result == "win") {
            echo "<div class='partie-bubble win'>";
            echo "<p>$id_partie</p>";
            echo "<p>$mot</p>";
            echo "<p>$erreurs</p>";
            echo "<p>$result 😁</p>";
            echo "</div>";
        } else {
            echo "<div class='partie-bubble loose'>";
            echo "<p>$id_partie</p>";
            echo "<p>$mot</p>";
            echo "<p>$erreurs</p>";
            echo "<p>$result 😫</p>";
            echo "</div>";
        }
    }

    ?>
    <a href="<?= config::$url . '/public/?p=play' ?>" class="play"> <span><p>&#43;</p></span> <p>New game</p> <p></p></a>

</div>