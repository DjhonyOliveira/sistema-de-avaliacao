<?php

namespace Source\Model;

use Source\Core\Message;

class Usuario extends Model
{
    public function __construct()
    {
        parent::__construct("tbusuarios", ["usrid"], ["usrname", "usremail", "usrpassword", "strid"]);
    }

    /**
     * Busca um usuário com base no Email
     * @param string $email
     * @return null|Usuario
     */
    public function findByEmail(string $email): ?Usuario
    {
        $user = $this->find('usremail=:usremail', "usremail={$email}")->fetch();

        return $user;
    }

    public function getAllUsers($linhaColuna = false){
        $aLista = [];

        $usuarios = $this->find()->fetch(true);
        $setores  = (new Setores())->getListaSetoresByPersistence();

        foreach($usuarios as $value){
            $retorno = $value->data;
            $linha = [];

            $linha[] = $retorno->usrid;
            $linha[] = $retorno->usrname;
            $linha[] = $retorno->usremail;

            foreach($setores as $id => $name){
                if($id == $retorno->strid){
                    $linha[] = $name;
                }
            }
            

            $aLista[] = $linha;
        }

        return $aLista;
    }

    /**
     * Função Para inserção de novos Usuários no sistema
     * @param string $name
     * @param string $email
     * @param string $password
     * @param int    $setor
     * @return bool
     */
    public function insertUser(string $name, string $email, string $password, int $setor): string
    {
        $message = new Message();

        if(is_email($email)){
            if($this->findByEmail($email)){
                return false;
            }

            $data['usremail'] = $email;
        } else {
            return $message->warning('Email inválido, informe um E-mail valido para seguir com o cadastro')->render();
        }

        if(is_passwd($password)){
            $hashSenha = passwd($password);

            $data['usrpassword'] = $hashSenha;
        } else {
            return $message->warning('Senha inválida, deve conter entre 8 e 40 caracteres')->render();
        }

        $data['usrname']  = $name;
        $data['strid']    = $setor;

        if($this->create($data)){            
            return $message->success('Usuário cadastrado com sucesso');
        }

        return $message->error('Erro ao cadastrar o usuário, tente novamente mais tarde');
    }

    public function deleteUser(int $id){
        $oMessage = new Message();

        if($this->delete('usrid', $id)){
            return $oMessage->success('Usuário deletado com sucesso')->render();
        }

        return $oMessage->error('Erro ao deletar o usuário, tente novamente')->render();
    }
}