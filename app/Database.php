<?php

namespace App;

use PDO;

class Database
{

    private $db_name;
    private $db_user;
    private $db_host;
    private $db_pass;
    private $pdo;

    public function __construct($db_name, $db_host = 'localhost', $db_user = 'root', $db_pass = '')
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    private function getPDO()
    {
        if ($this->pdo === null) {
            $bdd = new PDO("mysql:dbname=" . $this->db_name . ';host=' . $this->db_host, $this->db_user, $this->db_pass);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $bdd;
        }
        return $this->pdo;
    }

    public function query($request, $class_name)
    {
        $req = $this->getPDO()->query($request);
        $data = $req->fetchAll(PDO::FETCH_CLASS, Config::$PATH_MODELS . $class_name);

        return $data;
    }
}
