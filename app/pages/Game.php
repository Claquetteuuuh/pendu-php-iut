<?php

use \App\Utils;
use \App\Config;

if (!isset($_SESSION["username"])) {
    header("Location: " . Config::$url . "/public/?p=login");
}


if (!isset($_SESSION["mot"]) || $_SESSION["win"] == true) {
    if (!App::getDatabase()) {
        $_SESSION["mot"] = Utils::random_word($filename);
    } else {
        $_SESSION["mot"] = Utils::random_word_db(App::getDatabase());
    }
    $_SESSION["letters"] = "";
    $_SESSION["try"] = 0;
    $_SESSION["win"] = false;
} else {
    if (12 - $_SESSION["try"] < 1) {
        // loose
        App::getDatabase()->query("INSERT INTO parties (mots, erreurs, result, username1) VALUES ('" . $_SESSION['mot'] . "', '" . $_SESSION["try"] . "', 'loose', '" . $_SESSION["username"] . "');", "Mot");

        unset($_SESSION["letters"]);
        unset($_SESSION["try"]);
        unset($_SESSION["win"]);
        unset($_SESSION["mot"]);
        header("Location: " . Config::$url . "/public/?p=play");
        exit();
    }
}

echo $_SESSION["mot"];
$rendered = Utils::render_word($_SESSION["mot"], $_SESSION["letters"]);

if (!empty($_POST["letter"])) {
    if (!in_array($_POST["letter"], str_split($_SESSION["letters"]))) {
        $_SESSION["letters"] = $_SESSION["letters"] . $_POST["letter"];
        if (Utils::is_in($_POST["letter"], $_SESSION["mot"])) {
            $rendered = Utils::render_word($_SESSION["mot"], $_SESSION["letters"]);
        } else {
            $_SESSION["try"] += 1;
        }
    }
}

?>

<head>
    <link rel="stylesheet" href="<?= Config::$PATH_PUBLIC . 'css/game.css' ?>">
</head>
<a class="menu" href="<?= Config::$url . '/public/?p=home' ?>">
    <img src="<?= Config::$PATH_PUBLIC . 'assets/home-outline.svg' ?>" alt="home ouline" height=50>

</a>
<h1>
    Jeu du pendu
</h1>
<div class="container">
    <?php

    if (Utils::win($_SESSION["letters"], $_SESSION["mot"])) {
        // win
        App::getDatabase()->query("INSERT INTO parties (mots, erreurs, result, username1) VALUES ('" . $_SESSION['mot'] . "', " . $_SESSION["try"] . ", 'win', '" . $_SESSION["username"] . "');", "Mot");
        echo '<div class="win">
                <img src="./assets/win.jpg" />
                <p> YOU WON </p>
                <a href="./">MENU</a>
                </div>
            ';
        $_SESSION["win"] = true;
    }

    ?>
    <div class="left">
        <form action="<?= Config::$url . '/public/?p=play' ?>" method="POST">
            <p>Choisir une lettre</p>
            <input placeholder="A" name="letter" type="text" maxlength="1">
            <input type="submit" value="Confirmer">
            <p>Plus que
                <?php echo 12 - $_SESSION["try"]; ?> essai
            </p>
        </form>
    </div>
    <div class="right">
        <?php

        echo "<p>" . $rendered . "</p>";
        ?>
        <svg width="290" height="395" viewBox="0 0 290 395" fill="none" xmlns="http://www.w3.org/2000/svg">
            <?php
            $essaie = $_SESSION["try"];
            if ($essaie > 0) {
                echo '<line x1="222.835" class="svg_one" y1="390.23" x2="289.04" y2="390.23" stroke="black"
                        stroke-width="8" />';
            }
            if ($essaie > 1) {
                echo '<path class="svg_two" d="M253.785 4L253.785 394.5" stroke="black" stroke-width="4" />';
            }
            if ($essaie > 2) {
                echo '<line x1="37.6772" y1="2" x2="253.515" y2="2" stroke="black" stroke-width="4"/>';
            }
            if ($essaie > 3) {
                echo '<line x1="195.401" class="svg_four" y1="2.97254" x2="254.608" y2="65.9477" stroke="black" stroke-width="3" />';
            }
            if ($essaie > 4) {
                echo '<line class="svg_five" x1="35.6772" y1="42.7539" x2="35.6772" y2="3.99994" stroke="black" stroke-width="4" />';
            }
            if ($essaie > 5) {
                echo '<line x1="36.0822" class="svg_six" y1="33.2937" x2="73.7597" y2="2.07522" stroke="black" stroke-width="5" />';
            }
            if ($essaie > 6) {
                echo '<circle class="svg_seven" cx="37.6775" cy="80.4314" r="35.1775" stroke="black" stroke-width="5" />';
            }
            if ($essaie > 7) {
                echo '<line x1="40.1772" class="svg_eight" y1="118.109" x2="40.1772" y2="270.972" stroke="black" stroke-width="5" />';
            }
            if ($essaie > 8) {
                echo '<line x1="39.7512" y1="172.79" class="svg_nine" x2="2.07375" y2="228.768" stroke="black" stroke-width="5" />';
            }
            if ($essaie > 9) {
                echo '<line x1="73.4077" y1="228.807" class="svg_ten" x2="36.6572" y2="172.216" stroke="black" stroke-width="5" />';
            }
            if ($essaie > 10) {
                echo '<line x1="39.7512" class="svg_eleven" y1="272.369" x2="2.07375" y2="328.347" stroke="black" stroke-width="5" />';
            }
            if ($essaie > 11) {
                echo '<line x1="73.4077" y1="328.385" class="svg_twelve" x2="36.6572" y2="271.794" stroke="black" stroke-width="5" />';
            }

            ?>

        </svg>


    </div>
</div>