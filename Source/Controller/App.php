<?php

namespace Source\Controller;

use Source\Controller\Controller;
use Source\Core\Session;
use Source\Model\Usuario;

class App extends Controller
{

    public function login(): void
    {
        if(isset($_SESSION['authUser'])){
            redirect("/admin");
        }

        echo $this->view->render("login", []);
    }

    public function admin(): void
    {
        if(isset($_SESSION['authUser'])){
            $idUser = $_SESSION['authUser'];

           echo $this->view->render("admin", [
                "user" => (new Usuario())->findById("usrid", $idUser)
           ]);
        } else {
            redirect("/login");
        }
    }

    public function loginUser($data)
    {
        $session = new Session();
        $email   = $data['email'];
        $pass    = $data['pass'];

        if(is_email($email)){
            $user = (new Usuario())->findByEmail($email);

            if(empty($user)){
                $json['message'] = $this->message->warning('Usuário não cadastrado, contate o administrador do sistema')->render();

                echo json_encode($json);

                return;
            }
        } else {
            $json['message'] = $this->message->warning('Email inválido')->render();

            echo json_encode($json);

            return;
        }

        if(!is_passwd($pass)){
            $json['message'] = $this->message->warning('A senha deve ter no minimo 8 caracteres e no maximo 40')->render();

            echo json_encode($json);

            return;
        }
            
        if(passVerify($pass, $user->usrpassword)){
            $session->set('authUser', $user->usrid);

            $json['redirect'] = url("/admin");

            echo json_encode($json);

            return;
        } else {
            $json['message'] = $this->message->warning('Falha ao realizar login, confira suas credenciais de acesso')->render();

            echo json_encode($json);

            return;
        }
    }

}