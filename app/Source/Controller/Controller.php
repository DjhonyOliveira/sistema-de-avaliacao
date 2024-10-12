<?php 

namespace Source\Controller;

class Controller {

    protected $view;
    protected $message;

    public function __construct(){
            
        $this->view    = new View();
        $this->message = new Message();
    }
}