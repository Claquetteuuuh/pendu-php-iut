<?php

namespace App\Controllers;

use App;
use App\Config;

class PartieController extends appController
{
    public function index()
    {
        if (isset($_GET["username"])) {
            $username = $_GET["username"];
            $accounts = App::getDatabase()->query("SELECT * FROM `accounts` WHERE username='$username'", "Account");
            if (sizeof($accounts) != 0) {
                $parties = $accounts[0]->getParties();
                $this->render("home", $parties);
                return;
            }
        } else {
            if (isset($_SESSION["username"])) {
                $username = $_SESSION["username"];
                $accounts = App::getDatabase()->query("SELECT * FROM `accounts` WHERE username='$username'", "Account");
                if (sizeof($accounts) != 0) {
                    $parties = $accounts[0]->getParties();
                    $this->render("home", $parties);
                    return;
                }
            } else {
                header("Location: " . Config::$url . "/public/?p=login");
            }
        }
    }

    public function play()
    {
        if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
            $accounts = App::getDatabase()->query("SELECT * FROM `accounts` WHERE username='$username'", "Account");
            if (sizeof($accounts) != 0) {
                $parties = $accounts[0]->getParties();
                $this->render("game", $parties);
                return;
            }
        } else {
            header("Location: " . Config::$url . "/public/?p=login");
        }
    }
}