<?php

namespace Demo\Controller;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class HomeController extends BaseController{
    public function hello(Request $request, Response $response) {
        return $this->view->render($response, 'index.html', [
            "name" => "Michael"
        ]);
    }
}

