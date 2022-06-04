<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Serveces\Contract\Social;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect(string $driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function callback(string $driver, Social $social)
    {
        $social->registerViaSocialNetwork(Socialite::driver($driver)->user());
    }
}
