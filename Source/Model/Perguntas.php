<?php

namespace Source\Model;

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

}