<?php

namespace App\Controllers;

use App\config;

class Controller{
    protected $view_path; 
    protected $template;

    public function render($view){
        ob_start();

        require($this->view_path . str_replace(".", '/', $view) . '.php');
        $content = ob_get_clean();
        require($this->view_path . 'templates/' . $this->template . '.php');
    }
}