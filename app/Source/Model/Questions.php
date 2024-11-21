<?php

namespace Source\Model;

use Source\Model\Model;

class Questions extends Model
{
    public function __construct()
    {
        parent::__construct("tbperguntas", ["perid"], ["perdescricao", "perativa", "strid"]);
    }

    /**
     * Busca a quantidade de perguntas por setor
     * @param int $idSetor
     * @return int
     */
    public function buscaQuantidadePerguntas(int $idSetor): int
    {
        $coluns = 'count(*)';
        $terms  = 'strid = ' . $idSetor;

        $iQuantidade = $this->find($terms, null, $coluns)->fetch(true);

        return $iQuantidade['data'];
    }
}