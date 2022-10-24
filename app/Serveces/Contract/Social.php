<?php

namespace App\Serveces\Contract;

use Laravel\Socialite\Contracts\User;

interface Social
{
    public function authViaSocialNetwork(User $socialUser): string;
}
