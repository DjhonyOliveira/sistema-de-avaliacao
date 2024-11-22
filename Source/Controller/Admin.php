<?php

namespace Source\Controller;

use Source\Core\Session;
use Source\Model\Enum\EnumPametrosAdmin;

class Admin extends Controller
{
    public function request($request): void
    {
        $sRequestParam = $request['parametro'];

        switch($sRequestParam){
            case EnumPametrosAdmin::LOGOUT:
                $this->logout();
                break;
            case EnumPametrosAdmin::CADASTRAR_USUARIO:
                $this->insertUser();
                break;
            case EnumPametrosAdmin::ATUALIZAR_USUARIO:
                $this->updateUser();
                break;
            case EnumPametrosAdmin::DELETAR_USUARIO:
                $this->deleteUser();
                break;
            case EnumPametrosAdmin::CADASTRAR_SETOR:
                $this->insertSetor();
                break;
            case EnumPametrosAdmin::ATUALIZAR_SETOR:
                $this->updateSetor();
                break;
            case EnumPametrosAdmin::DELETAR_SETOR:
                $this->deleteSetor();
                break;
            case EnumPametrosAdmin::CADASTRAR_PERGUNTA:
                $this->insertPergunta();
                break;
            case EnumPametrosAdmin::ATUALIAZAR_PERGUNTA:
                $this->updatePergunta();
                break;
            case EnumPametrosAdmin::DELETAR_PERGUNTA:
                $this->deletePergunta();
                break;
        }
    }

    private function logout()
    {
        if(isset($_SESSION['authUser']) && isset($_SESSION['userSetor'])){
            $session = new Session();
            $session->unsetAll();
            $session->destroy();

            redirect("/login");
        }
    }

    private function insertUser()
    {

    }

    private function updateUser()
    {

    }

    private function deleteUser()
    {

    }

    private function insertPergunta()
    {

    }

    private function updatePergunta()
    {

    }

    private function deletePergunta()
    {

    }

    private function insertSetor()
    {

    }

    private function updateSetor()
    {

    }

    private function deleteSetor()
    {

    }
}