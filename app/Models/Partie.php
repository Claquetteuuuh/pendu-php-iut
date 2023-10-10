<?php

namespace App\Models;

use App;

class Partie{
    private $id_partie;
    private $erreurs;
    private $mots;
    private $result;
    private $username1;
    private $username2;


    public function getId_partie(){
        return $this->id_partie;
    }

    public function getErreurs(){
        return $this->erreurs;
    }

    public function getMots(){
        return $this->mots;
    }

    public function getResult(){
        return $this->result;        
    }

    public function getUsername1(){
        return $this->username1;
    }

    public function getUsername2(){
        return $this->username2;
    }

    
}