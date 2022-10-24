<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Serveces\Contract\Social;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\RedirectResponse;

class SocialController extends Controller
{
    public function redirect(string $driver): RedirectResponse
    {
        return Socialite::driver($driver)->redirect();
    }

    public function callback(string $driver, Social $social): void
    {
        $social->authViaSocialNetwork(Socialite::driver($driver)->user());
    }
}
