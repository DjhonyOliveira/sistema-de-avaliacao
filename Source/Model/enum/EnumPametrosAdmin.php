<?php

namespace Source\Model\Enum;

abstract class EnumPametrosAdmin
{
    const LOGOUT = 'logout';

    const CADASTRAR_USUARIO = 'userInsert',
          ATUALIZAR_USUARIO = 'userUpdate',
          DELETAR_USUARIO   = 'userDelete';

    const CADASTRAR_PERGUNTA  = 'perInsert',
          ATUALIAZAR_PERGUNTA = 'perUpdate',
          DELETAR_PERGUNTA    = 'perDelete';

    const CADASTRAR_SETOR = 'setInsert',
          ATUALIZAR_SETOR = 'setUpdate',
          DELETAR_SETOR   = 'setDelete';
}