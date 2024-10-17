<?php

namespace Source\Controller;

use Source\Controller\Controller;

class Web extends Controller {

    public function home(): void
    {
        echo $this->view->render("home", []);
    }

    public function avaliacao(): void
    {
        echo $this->view->render("avaliacao", []);
    }

    public function login(): void
    {
        echo $this->view->render("login", []);
    }

    public function captaRespostas(): void
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
        }
    }
}