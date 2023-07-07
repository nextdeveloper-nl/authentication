<?php

namespace NextDeveloper\Authentication\Services\OAuth2\LoginMechanisms;

use NextDeveloper\Accounts\Database\Models\User;

class OneTimeEmail implements ILoginService
{
    public function create(User $user)
    {

    }

    public function generatePassword()
    {

    }

    public function attempt($loginData)
    {

        return true;
        // TODO: Implement attempt() method.
    }

    public function __construct($configuration, $loginData)
    {

    }
}