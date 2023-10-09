<?php

namespace App\Models;

use App;

class Account{
    private $username; 
    private $password;

    public function __get($key){
        $method = 'get' . ucfirst($key);
        $this->$method();
    }

    public function getUsername(){
        return $this->username;
    }
    
    public function getPassword(){
        return $this->password;
    }

    /**
    * @return Parties[] 
    */
    public function getParties(): array{
        $parties = App::getDatabase()->query("SELECT * FROM Parties WHERE username1='".$this->getUsername()."' OR username2='". $this->getUsername() . "'", "Partie");
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