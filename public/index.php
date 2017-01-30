<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require __DIR__.'/../vendor/autoload.php';

$container = new \Slim\Container;
$container['settings']['displayErrorDetails'] = true;

$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__.'/../views', [
        'cache' => false
    ]);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
};

$container['controller.home'] = function($container) {
    return new \Demo\Controller\HomeController($container['view']);
};

$container['controller.weather'] = function($container) {
    return new \Demo\Controller\WeatherController($container['view']);
};

$app = new \Slim\App($container);
$app->get('/', "controller.home:hello");
$app->get('/weather', "controller.weather:index");
$app->run();
