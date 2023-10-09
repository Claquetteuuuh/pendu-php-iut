<?php

namespace App\Models;

class Mot
{
    private $valeur;

    public function __get($key){
        $method = 'get' . ucfirst($key);
        $this->$method();
    }

    public function getValeur()
    {
        return $this->valeur;
    }
}
