<?php

namespace App\Controllers;

use App\Config;
use App\Controller\Controllers;

class appController extends Controller{
    protected $template = 'Layout';


    public function __construct()
    {
        $this->view_path = config::$PATH_VIEWS;
    }
}