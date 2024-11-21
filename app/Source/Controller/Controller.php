<?php 

namespace Source\Controller;

use Source\Core\Message;
use Source\View\View;

class Controller {

    protected $view;
    protected $message;

    public function __construct(){
        $this->view = new View();
        $this->message = new Message();
    }
}