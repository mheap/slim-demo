<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require __DIR__.'/../vendor/autoload.php';

$container = new \Slim\Container;
$container['settings']['displayErrorDetails'] = true;

$app = new \Slim\App($container);
$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write("Hello World");
    return $response;
});
$app->run();
