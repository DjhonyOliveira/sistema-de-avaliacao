<?php

namespace Source\Controller;

use Source\Controller\Controller;
use Source\Model\Avaliacao;
use Source\Model\Perguntas;
use Source\Model\Setores;

class Web extends Controller {

    public function avaliacao(): void
    {
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $this->getPerguntasByIdsetor();
        } else {
            $this->renderPageAvaliacao();
        }
    }

    public function setores()
    {
        echo $this->view->render("home", [
            "setores" => (new Setores())->getListaSetoresByPersistence()
        ]);
    }

    private function getPerguntasByIdsetor(): void
    {
        if(!empty($_GET['setor'])){
            $idSetor  = (int)  $_GET['setor'];
            $aSetores = (new Perguntas())->getPerguntasByIdRelacionamento($idSetor);

            echo json_encode($aSetores);
        }
    }

    private function renderPageAvaliacao()
    {
        echo $this->view->render("avaliacao", []);
    }

    public function captaRespostas($request): void
    {
        $bInserido = (new Avaliacao())->insereAvaliacao($request);

        if($bInserido){
            echo true;
        } else {
            echo false;
        }
    }
    
}