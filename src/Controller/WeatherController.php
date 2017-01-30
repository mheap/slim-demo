<?php

namespace Demo\Controller;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class WeatherController extends BaseController{
    public function index(Request $request, Response $response) {
        return $this->view->render($response, 'weather.html');
    }
}

