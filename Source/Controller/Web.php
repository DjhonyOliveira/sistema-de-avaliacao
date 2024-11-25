<?php

namespace Source\Controller;

use Source\Controller\Controller;
use Source\Core\Message;
use Source\Core\Session;
use Source\Model\Avaliacao;
use Source\Model\Perguntas;
use Source\Model\Setores;

class Web extends Controller {

    public function avaliacao(): void
    {
        if(isset($_SESSION['authUser'])){
            $oSession = new Session();
            $oSession->unsetAll();
            $oSession->destroy();
        }

        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $this->getPerguntasByIdsetor();
        } else {
            $this->renderPageAvaliacao();
        }
    }

    public function setores()
    {
        if(isset($_SESSION['authUser'])){
            $oSession = new Session();
            $oSession->unsetAll();
            $oSession->destroy();
        }

        echo $this->view->render("home", [
            "setores" => (new Setores())->getListaSetoresByPersistence()
        ]);
    }

    private function getPerguntasByIdsetor(): void 
    {
        $oMessage = new Message();

        if(!empty($_GET['setor'])){
            $idSetor  = (int) $_GET['setor'];

            $aSetores = (new Perguntas())->getPerguntasByIdRelacionamento($idSetor);
            
            if(empty($aSetores)){
                $sMensagemRetorno['message'] = $oMessage->error('Não foram encontradas perguntas para o setor informado')->render();

                echo json_encode($sMensagemRetorno);
                return;
            }          

            echo json_encode($aSetores);
            return;
        } else {
            $sMensagemRetorno['message'] = $oMessage->warning('Informe um setor para começar a avaliação')->render();

            echo json_encode($sMensagemRetorno);
            return;
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