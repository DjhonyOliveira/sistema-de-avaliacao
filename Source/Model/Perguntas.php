<?php

namespace Source\Model;

use Source\Core\Message;
use Source\Model\Model;
use stdClass;

class Perguntas extends Model
{
    public function __construct()
    {
        parent::__construct("tbperguntas", ["perid"], ["perdescricao", "perativa", "strid"]);
    }

    /**
     * Retorna um array com todas as perguntas referente ao setor selecionado
     * @param int $id
     * @return array
     */
    public function getPerguntasByIdRelacionamento(int $id): array
    {
        $aBuscaPerguntas = $this->findById('strid', $id, '*', true);
        $aPerguntas      = [];

        foreach($aBuscaPerguntas as $oModelPerguntas){
            $aDados = $oModelPerguntas->data;
            
            $oPergunta = new stdClass();
            $oPergunta->id       = $aDados->perid;
            $oPergunta->pergunta = $aDados->perdescricao;

            $aPerguntas[] = $oPergunta;
        }

        return $aPerguntas;
    }

    /**
     * retorna todas as perguntas cadastradas em sistema
     * @return array
     */
    public function getAllPerguntas(): array
    {
        $aPerguntas = $this->find()->fetch(true);
        $aSetores   = (new Setores())->getListaSetoresByPersistence();
        $aLista     = [];

        foreach($aPerguntas as $value){
            $retorno = $value->data;
            $linha = [];

            $linha[] = $retorno->perid;
            $linha[] = $retorno->perdescricao;

            foreach($aSetores as $id => $name){
                if($id == $retorno->strid){
                    $linha[] = $name;
                }
            }
            
            $aLista[] = $linha;
        }

        return $aLista;
    }

    public function insertPergunta(string $pergunta, int $setor): string
    {
        $aData    = [];
        $oMessage = new Message();

        $aData['perdescricao'] = $pergunta;
        $aData['strid']        = $setor;

        if($this->create($aData)){
            return $oMessage->success('Pergunta cadastrada com sucesso');
        }

        return $oMessage->error('Erro ao inserir a pergunta, tente novamente');
    }

    public function deletePergunta(int $id): string
    {
        $oMessage = new Message();

        if($this->delete('perid', $id)){
            return $oMessage->success('Pergunta deletada com sucesso');
        }

        return $oMessage->error('Erro ao deletar a pergunta, tente novamente');
    }
}