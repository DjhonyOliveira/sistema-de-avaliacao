<?php

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;
use Source\Core\Session;

$session = new Session();
$router  = new Router(url(), ":");

/** Rotas Navegação Refente a Rotina de Avaliação */
$router->namespace("Source\Controller");
$router->get("/", "Web:setores");
$router->get("/avaliacao", "Web:avaliacao");
$router->post("/avaliacao", "Web:captaRespostas");

/** Rotas de Navegação Referente ao Painel Admin */
$router->get("/login", "App:login");
$router->post("/login", "App:loginUser");
$router->get("/admin", "App:admin");
$router->post("/admin", "Admin:request");

$router->dispatch();