<?php

namespace Source\Model;

class Setores extends Model
{
 
    public function __construct()
    {
        parent::__construct("tbsetores", ["strid"], ["strnome"]);
    }

    public function getListaSetoresByPersistence(): array
    {
        $aLista = [];

        $setores = $this->find()->fetch(true);

        foreach($setores as $value){
            $retorno = $value->data;

            $aLista[$retorno->strid] = $retorno->strnome;
        }

        return $aLista;

    }
}