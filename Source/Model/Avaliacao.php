<?php

namespace Source\Model;

use Source\Model\Model;

class Avaliacao extends Model
{

    public function __construct()
    {
        parent::__construct("tbavaliacao", ["avaid"], ["avanota", "perid"]);
    }

    public function insereAvaliacao(array $avaliacoes): bool
    {
        foreach($avaliacoes as $avaliacao){
            $data = [];

            foreach($avaliacao as $chave => $valor){
                if($chave == 'idQuestion'){
                    $sIdTable   = str_replace($chave, 'idQuestion', 'perid');

                    $data[$sIdTable] = $valor;
                }

                if($chave == 'notaAvaliacao'){
                    $sNotaTable = str_replace($chave, 'notaAvaliacao', 'avanota');

                    $data[$sNotaTable] = $valor;
                }              
            }

            if(!$this->create($data)){
                return false;
            }
        }

        return true;
    }
}