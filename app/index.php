<?php

use App\Source\Core\Connect;
use CoffeeCode\Router\Router;

require __DIR__ . "/vendor/autoload.php";

$router = new Router(url(), ":");

$router->namespace("/app/Source/Controller");
$router->get("/", "Web:home");

$router->dispatch();