<?php

namespace App\Models;

use App;

class Account{
    private $id_account;
    private $username; 
    private $password;

    public function getId_account(){
        return $this->id_account;
    }
    public function getUsername(){
        return $this->username;
    }
    
    public function getPassword(){
        return $this->password;
    }

    /**
    * @return Partie[] 
    */
    public function getParties(): array{
        $parties = App::getDatabase()->query("SELECT * FROM `parties` WHERE username1='".$this->getUsername()."' OR username2='". $this->getUsername() . "' ORDER BY erreurs ASC", "Partie");
        return $parties;
    }

    /**
    * @return Account[]
    */
    static function createAccount($username, $password): array{
        $hash = hash('sha256', $password);
        App::getDatabase()->query("INSERT INTO accounts (username, password) VALUES ('$username', '$hash')", 'Account');
        $account = App::getDatabase()->query("SELECT * FROM accounts WHERE username='$username'", 'Account');
        return $account;
    }

    static function findOne($username){
        $account =  App::getDatabase()->query("SELECT * FROM accounts WHERE username='$username'", 'Account');
        return $account;
    }

    static function checkPassword($password, $hash): bool{
        $new_hash = hash('sha256', $password);
        return $hash == $new_hash;
    }

}