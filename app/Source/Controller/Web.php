<?php

namespace Source\Controller;

use Source\Controller\Controller;

class Web extends Controller {

    public function home(): void
    {

        echo $this->view->render("home", []);
    }
}