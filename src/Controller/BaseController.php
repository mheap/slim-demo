<?php

namespace Demo\Controller;

class BaseController {

    protected $view;

    public function __construct($view) {
        $this->view = $view;
    }
}


