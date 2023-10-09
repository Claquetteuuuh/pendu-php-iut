<?php

namespace App\Controllers;

use App\config;
use App\Controller\Controllers;

class appController extends Controller{
    protected $template = 'Layout';


    public function __construct()
    {
        $this->view_path = config::$PATH_VIEWS;
    }
}