<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendu</title>
    <link rel="stylesheet" href="/global.css">
    <link rel="stylesheet" href="/home.css">
</head>

<body>

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            text-decoration: none;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            list-style-type: none;
        }
    </style>
    <style>
        body {
            background: linear-gradient(150deg, rgba(205, 58, 255, .3) 0%, rgba(0, 110, 255, .2) 100%);
            background-repeat: no-repeat;
            min-height: 90vh;
        }

        h1 {
            text-align: center;
            padding-top: 20px;
        }

        .svg_head {}

        .container {
            margin-top: 50px;
            display: flex;
            align-items: center;
            justify-content: space-evenly;

        }

        .left {
            position: relative;
            width: 60%;
            height: 100%;
        }

        .right {
            position: relative;
            width: 30%;
        }

        form {
            color: white;
            background-color: #00000020;
            padding: 10%;
            width: 80%;
            height: 100%;
            display: flex;
            flex-direction: column;
            text-align: center;
            align-items: center;
            border-radius: 10px;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }

        form p {
            font-size: 20px;
        }

        form input[type="text"] {
            width: 30px;
            text-align: center;
            font-size: 30px;
            background: #FFFFFF50;
            border-radius: 5px;
            margin: 10px;
            margin-top: 30px;

            outline: none;
            border: none;

        }

        form input[type="submit"] {
            background-color: white;
            border: none;
            outline: none;
            padding: 3% 4%;
            border-radius: 5px;
            cursor: pointer;
            transition: all .3s;
        }

        form input[type="submit"]:hover {
            box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
        }

        .right p {
            position: relative;
            text-align: center;
            margin-bottom: 30px;
            letter-spacing: 3px;
            font-size: 40px;
            color: white;
            letter-spacing: 10px;
        }

        .win {
            position: absolute;
            height: 70%;
            width: 70%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 2%;
            background-color: #00000080;
            border-radius: 20px;
            color: white;
        }

        .win img {
            position: relative;
            width: 60%;

        }
    </style>

    <?php

    require("./utils.php");
    require("./config.php");

    $bdd;
    $working_db = true;

    try {
        $bdd = mysqli_connect($host, $db_user, $db_password, $db);

    } catch (Exception $e) {
        $working_db = false;
        die('erreur: ' . $e->getMessage());
    }

    session_name("game_launched");
    session_start();
    if (!isset($_SESSION["mot"]) || $_SESSION["win"] == true) {
        if (!$working_db) {
            $_SESSION["mot"] = random_word($filename);
        }else{
            $_SESSION["mot"] = random_word_db($bdd);
        }
        $_SESSION["letters"] = "";
        $_SESSION["try"] = 0;
        $_SESSION["win"] = false;
    } else {
        if (12 - $_SESSION["try"] < 1) {
            // loose
            $bdd->query("INSERT INTO parties (mots, erreurs, result) VALUES ('". $_SESSION['mot'] . "', '". $_SESSION["try"] ."', 'loose');");

            session_destroy();
            header("Location: http://localhost/pendu/");
            exit();
        }
    }

    echo $_SESSION["mot"];
    $rendered = render_word($_SESSION["mot"], $_SESSION["letters"]);

    if (!empty($_POST["letter"])) {
        if (!in_array($_POST["letter"], str_split($_SESSION["letters"]))) {
            $_SESSION["letters"] = $_SESSION["letters"] . $_POST["letter"];
            if (is_in($_POST["letter"], $_SESSION["mot"])) {
                $rendered = render_word($_SESSION["mot"], $_SESSION["letters"]);
            } else {
                $_SESSION["try"] += 1;
            }
        }

    }

    ?>

    <h1>
        Jeu du pendu
    </h1>
    <div class="container">
        <?php

        if (win($_SESSION["letters"], $_SESSION["mot"])) {
            // win
            $bdd->query("INSERT INTO parties (mots, erreurs, result) VALUES ('". $_SESSION['mot'] . "', '". $_SESSION["try"] ."', 'win');");
            echo '<div class="win">
                <img src="./assets/win.jpg" />
                <p> YOU WON </p>
                <a href="./">REJOUER</a>
                </div>
            ';
            $_SESSION["win"] = true;
        }

        ?>
        <div class="left">
            <form action="index.php" method="POST">
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


</body>

</html>