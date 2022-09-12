<?php

namespace App\Repository;

use App\Models\User;

class AuthRepository
{
    public function salvarUsuario($usuario)
    {
        try {

            return User::create($usuario);

        } catch (\Throwable $th) {
            throw $th;
        }
    }


}
