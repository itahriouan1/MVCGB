<?php

namespace lib\Controller;

use lib\View\View;

class AbstractController {

    protected $View;

    public function __construct() {
        $this->View = new View();
    }
}