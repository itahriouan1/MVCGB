<?php

namespace src\Controller;

use lib\Controller\AbstractController;
use lib\View\View;

class DefaultController extends AbstractController{


    public function index(){
        $view = $this->View;
        $view->render("index");
    }
}