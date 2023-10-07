<?php

    namespace App;

    class config {
        static $filename = "./assets/word_list.txt";
        static $host = 'localhost:3306';
        static $db = 'pendu';
        static $db_user = 'root';
        static $db_password = '';

        static $PATH_MODELS = "App\Models\\";
        static $PATH_VIEWS = "App\pages\\";
        static $PATH_PUBLIC = "Public\\";
        static $PATH_CORE = "Core\\";
    }
