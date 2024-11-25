<?php

namespace Source\Model;

use Source\Core\Message;

class Setores extends Model
{
 
    public function __construct()
    {
        parent::__construct("tbsetores", ["strid"], ["strnome"]);
    }

    public function getListaSetoresByPersistence(bool $linhaColuna = false): array
    {
        $aLista = [];

        $setores = $this->find()->fetch(true);

        foreach($setores as $value){
            $retorno = $value->data;

            if($linhaColuna){
                $linha = [];

                $linha[] = $retorno->strid;
                $linha[] = $retorno->strnome;

                $aLista[] = $linha;
            } else {
                $aLista[$retorno->strid] = $retorno->strnome;
            }
            
        }

        return $aLista;
    }

    public function insertSetor(string $nomeSetor): string
    {
        $data = [];
        $oMessage = new Message();

        $data['strnome'] = $nomeSetor;

        if($this->create($data)){
            return $oMessage->success('Setor inserido com sucesso')->render();
        }

        return $oMessage->error('Erro ao inserir o setor, tente novamente')->render();
    }

    public function deleteSetor(int $idSetor)
    {
        $oMessage = new Message();

        if($this->delete('strid', $idSetor)){
            return $oMessage->success('Setor deletado com sucesso')->render();
        }

        return $oMessage->error('Erro ao deletar o setor, tente novamente')->render();
    }
}