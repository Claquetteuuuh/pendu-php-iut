<?php
use App\Config;

?>

<head>
    <link rel="stylesheet" href="<?= config::$PATH_PUBLIC . 'css/global.css' ?>">
    <link rel="stylesheet" href="<?= config::$PATH_PUBLIC . 'css/home.css' ?>">
</head>


<div class="partie-container">
    <h1>Historique</h1>

    <div class="partie-bubble">
        <p>Id Partie</p>
        <p>Mot</p>
        <p>Erreurs</p>
        <p>Status</p>
    </div>
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
    <?php
    if (isset($_GET["username"])) {
        if (isset($_SESSION["username"])) {
            if ($_GET["username"] == $_SESSION["username"]) {
                $url = Config::$url . "/public/?p=play";
                echo "
                    <a href='$url' class='play'> <span>
                        <p>&#43;</p>
                        </span>
                        <p>Play</p>
                        <p></p>
                    </a>
                    ";
            }
        }
    } else if (isset($_SESSION["username"])) {
        $url = Config::$url . "/public/?p=play";
        echo "
            <a href='$url' class='play'> <span>
                <p>&#43;</p>
                </span>
                <p>Play</p>
                <p></p>
            </a>
        ";
    }
    ?>

</div>