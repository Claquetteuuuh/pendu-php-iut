<?php

namespace App\Models;

use App;

class ClassementBubble{
    private $joueur;
    private $victoires;
    public function __get($key){
        $method = 'get' . ucfirst($key);
        $this->$method();
    }

    public function getJoueur(){
        return $this->joueur;
    }
    public function getVictoires(){
        return $this->victoires;
    }

}