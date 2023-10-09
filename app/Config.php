<?php

    namespace App;

    class config {
        static $filename = "./assets/word_list.txt";
        static $host = 'localhost:3306';
        static $db = 'pendu';
        static $db_user = 'root';
        static $db_password = '';
        static $url = 'http://localhost/pendu-php-iut';

        static $PATH_MODELS = "App\Models\\";
        static $PATH_VIEWS = "../app/pages/";
        static $PATH_PUBLIC = "../public/";
        static $PATH_CORE = "Core\\";
    }
