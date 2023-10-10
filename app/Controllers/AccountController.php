<?php

namespace App\Controllers;

use App;
use App\config;
use App\Controller\Controllers;
use App\Models\Account;
use App\Models\ClassementBubble;

class AccountController extends AppController
{
    public function login()
    {
        if (isset($_SESSION["username"])) {
            $account = Account::findOne(trim(strtolower($_SESSION["username"])));
            if (sizeof($account) != 0) {
                header("Location: " . Config::$url . "/public/");
            } else {
                unset($_SESSION["username"]);
                header("Location: " . Config::$url . "/public/");
            }
        }else{
            if (isset($_POST["username"]) && isset($_POST["password"])) {
                $account = Account::findOne(trim(strtolower($_POST["username"])));
                if(sizeof($account) != 0){
                    if(Account::checkPassword($_POST["password"], $account[0]->getPassword())){
                        $_SESSION["username"] = $account[0]->getUsername(); 
                    }else{
                        echo "<script>alert('Bad password')</script>";
                    }
                    if (isset($_SESSION["username"])) {
                        header("Location: " . Config::$url . "/public/");
                    }
                }else{
                    echo "<script>alert('This account doesn\'t exists')</script>";
                }
            }
        }
        $this->render("login", []);
    }

    public function signup()
    {
        if (isset($_SESSION["username"])) {
            $account = Account::findOne(trim(strtolower($_SESSION["username"])));
            if (sizeof($account) != 0) {
                header("Location: " . Config::$url . "/public/");
            }
        } else {
            if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["password2"])) {
                // verif meme password
                if ($_POST["password"] == $_POST["password2"]) {
                    $account = Account::createAccount(trim(strtolower($_POST["username"])), $_POST["password"]);
                    $_SESSION["username"] = $account[0]->getUsername();
                } else {
                    echo "<script>alert('Le mot de passe n\'est pas le meme')</script>";
                }
                if (isset($_SESSION["username"])) {
                    header("Location: " . Config::$url . "/public/");
                }
            }
        }

        $this->render("signup", []);
    }

    public function logout()
    {
        if (isset($_SESSION["username"])) {
            unset($_SESSION["username"]);
            unset($_SESSION["letters"]);
            unset($_SESSION["try"]);
            unset($_SESSION["win"]);
            unset($_SESSION["mot"]);
        }
        header("Location: " . Config::$url . "/public/");
    }

    public function classement(){
        $bubbles = App::getDatabase()->query("SELECT username1 AS joueur, COUNT(*) AS victoires FROM `parties` WHERE result = 'win' GROUP BY username1 ORDER BY victoires DESC LIMIT 5;", "ClassementBubble");
        $this->render("classement", $bubbles);
    }
}
