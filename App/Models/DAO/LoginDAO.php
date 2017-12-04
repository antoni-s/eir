<?php

namespace App\Models\DAO;

use App\Models\Entidades\Login;

class LoginDAO extends BaseDAO
{

    public  function validaLogin($email, $password)
    {
        if($email && $password) {
            $resultado = $this->select(
                "SELECT id, nome, tipo FROM usuario WHERE email = '$email' && senha = '$password'"
            );

            return $resultado->fetch();
        }else{
           return false;
        }

        return false;
    }
}
