<!DOCTYPE html>
<html lang="en">
<?php

use App\Config;

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendu</title>
</head>

<body>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            text-decoration: none;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
                Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
            list-style-type: none;
        }

        body {
            background-image: linear-gradient(170deg,
                    hsl(285deg 100% 70%) 0%,
                    hsl(247deg 100% 75%) 57%,
                    hsl(214deg 99% 61%) 100%);
            background-repeat: no-repeat;
            min-height: 100vh;
            width: 100%;
            position: relative;
        }

        ::-webkit-scrollbar {
            width: 7px;
        }

        ::-webkit-scrollbar-track {
            background: #444444;
        }

        ::-webkit-scrollbar-thumb {
            background-image: linear-gradient(180deg,
                    hsl(284deg 33% 66%) 0%,
                    hsl(275deg 36% 70%) 11%,
                    hsl(267deg 40% 74%) 22%,
                    hsl(259deg 43% 78%) 33%,
                    hsl(251deg 47% 81%) 44%,
                    hsl(244deg 51% 84%) 56%,
                    hsl(236deg 58% 87%) 67%,
                    hsl(231deg 67% 89%) 78%,
                    hsl(226deg 80% 92%) 89%,
                    hsl(222deg 100% 94%) 100%);
            border-radius: 10px;
        }

        .logout-icon {
            position: absolute;
            left: 0;
            top: 0;
            margin: 10px;
        }

        .menu-icon {
            position: absolute;
            left: 60px;
            top: 0;
            margin: 10px;
            
        }
        .classement-icon{
            position: absolute;
            left: 125px;
            top: 0;
            margin: 10px;
        }
        .menu-icon img{
            height: 46px;
        } 
        .logout-icon img{
            height: 50px;
        } 
        .classement-icon img{
            height: 42px;
        }
    
    </style>
    <?= $content; ?>


    <a href="<?= Config::$url . '/public/?p=logout' ?>" class="logout-icon">
        <img src="<?= Config::$PATH_PUBLIC . 'assets/log-out-outline.svg' ?>" alt="logout svg">
    </a>
    <a class="menu-icon" href="<?= Config::$url . '/public/?p=home' ?>">
        <img src="<?= Config::$PATH_PUBLIC . 'assets/home-outline.svg' ?>" alt="home svg" >
    </a>
    <a class="classement-icon" href="<?= Config::$url . '/public/?p=classement' ?>">
        <img src="<?= Config::$PATH_PUBLIC . 'assets/rank.svg' ?>" alt="rank svg">
    </a>
</body>

</html>