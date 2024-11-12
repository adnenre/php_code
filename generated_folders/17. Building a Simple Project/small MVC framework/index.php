<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Core\Request;
use App\Core\Response;
use App\Core\Router;
use App\Controllers\HomeController;
use App\Controllers\AboutController;
use App\Controllers\ServicesController;
use App\Controllers\ContactController;



$request = new Request();
$response = new Response();
$router = new Router();


// Add routes
$router->addRoute('GET', '/', [new HomeController(), 'index']);
$router->addRoute('GET', '/about', [new AboutController(), 'showAboutPage']);
$router->addRoute('GET', '/services', [new ServicesController(), 'showServicePage']);
$router->addRoute('GET', '/contact', [new ContactController(), 'showContactPage']);

$router->dispatch($request);
