<?php

namespace Source\Model;

class Usuario extends Model
{
    public function __construct()
    {
        parent::__construct("tbusuarios", ["usrid"], ["usr_name", "usremail", "usrpassword", "strid"]);
    }

    public function findByEmail(string $email): ?Usuario
    {
        $user = $this->find('usremail=:usremail', "usremail={$email}")->fetch();

        return $user;
    }
}