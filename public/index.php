<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use \Flexsounds\Component\SymfonyContainerSlimBridge\ContainerBuilder;
use \Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

require __DIR__.'/../vendor/autoload.php';

$container = new ContainerBuilder();
$loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../config'));
$loader->load('services.yml');

$app = new \Slim\App($container);
$app->get('/', 'HomeController:hello');
$app->get('/weather', "WeatherController:index");
$app->run();
