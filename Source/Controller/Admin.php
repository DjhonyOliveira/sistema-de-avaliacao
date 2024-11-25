<?php

namespace Source\Controller;

use JsonSerializable;
use Source\Core\Session;
use Source\Model\Perguntas;
use Source\Model\Setores;
use Source\Model\Usuario;

class Admin extends Controller
{

    public function request($request): void
    {
        $sRequestParam = $request['parametro'];

        switch($sRequestParam){
            case 'logout':
                $this->logout();
                break;
            case 'userInsert':
                $this->insertUser($request);
                break;
            case 'userDelete':
                $this->deleteUser($request);
                break;
            case 'setInsert':
                $this->insertSetor($request);
                break;
            case 'setDelete':
                $this->deleteSetor($request);
                break;
            case 'perInsert':
                $this->insertPergunta($request);
                break;
            case 'perDelete':
                $this->deletePergunta($request);
                break;
        }
    }

    /**
     * Realiza o logout do usuário atual
     * @return void
     */
    private function logout(): void
    {
        if(isset($_SESSION['authUser']) && isset($_SESSION['userSetor'])){
            $session = new Session();
            $session->unsetAll();
            $session->destroy();

            echo json_encode(url("/login"));

            return;
        }
    }

    /**
     * Realiza a conexão com o modelo para insersão de usuário
     * @param array $request
     * @return void
     */
    private function insertUser(array $request): void
    {
        $nome  = (string) $request['nome'];
        $email = (string) $request['email'];
        $senha = (string) $request['senha'];
        $setor = (int) $request['setor'];

        $sRetornoInsert['message'] = (new Usuario())->insertUser($nome, $email, $senha, $setor);

        echo json_encode($sRetornoInsert);
        return;
    }

    /**
     * Realiza a conexão com o modelo para deletar o usuário
     * @param array $request
     * @return void
     */
    private function deleteUser(array $request): void
    {
        $idUser = (int) $request['id'];

        $sMensagemRetorno['message'] = (new Usuario())->deleteUser($idUser);

        echo json_encode($sMensagemRetorno);
        return;
    }

    /**
     * Realiza a conexão com o modelo para inserir pergunta
     * @param array $request
     * @return void
     */
    private function insertPergunta(array $request): void
    {
        $pergunta = (string) $request['pergunta'];
        $setor    = (int) $request['setor'];

        $sMensagemRetorno['message'] = (new Perguntas())->insertPergunta($pergunta, $setor);

        echo json_encode($sMensagemRetorno);
        return;
    }

    /**
     * Realiza a conexão com o modelo para deletar pergunta
     * @param array $request
     * @return void
     */
    private function deletePergunta(array $request): void
    {
        $id = (int) $request['id'];

        $sMensagemRetorno['message'] = (new Perguntas())->deletePergunta($id);

        echo json_encode($sMensagemRetorno);
        return;
    }

    /**
     * Realiza a conexão com o modelo para inserir um setor
     * @param array $request
     * @return void
     */
    private function insertSetor(array $request): void
    {
        $nomeSetor = (string) $request['nomeSetor'];

        $sMensagemRetorno['message'] = (new Setores())->insertSetor($nomeSetor);

        echo json_encode($sMensagemRetorno);
        return;
    }

    /**
     * Realiza a conexão com o modelo para deletar um setor
     * @param array $request
     * @return void
     */
    private function deleteSetor(array $request): void
    {
        $idSetor = (int) $request['id'];

        $sMensagemRetorno['message'] = (new Setores())->deleteSetor($idSetor);

        echo json_encode($sMensagemRetorno);
        return;
    }
}