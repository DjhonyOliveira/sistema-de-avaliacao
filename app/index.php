<?php
ob_start();

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(url(), ":");

$router->namespace("Source\Controller");
$router->get("/", "Web:home");
$router->get("/login", "Web:login");
$router->get("/avaliacao", "Web:avaliacao");
$router->post("/avaliacao", "Web:captaRespostas");

$router->dispatch();

ob_end_flush();