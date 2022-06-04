<?php

namespace App\Serveces\Contract;

use Laravel\Socialite\Contracts\User;

interface Social
{
    public function registerViaSocialNetwork(User $socialUser): string;
}
