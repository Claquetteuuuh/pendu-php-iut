<?php

class App{
    private static $database;

    public static function getDatabase(){

        if(self::$database === null){
            self::$database =  new \App\Database(\App\Config::$db, \App\Config::$host, \App\Config::$db_user, \App\Config::$db_password);
        }
        return self::$database;
    }
}