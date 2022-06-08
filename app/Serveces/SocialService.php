<?php

namespace App\Serveces;

use App\Serveces\Contract\Social;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Laravel\Socialite\Contracts\User as SocialUser;
use App\Models\User;

class SocialService implements Social
{
    public function authViaSocialNetwork(SocialUser $socialUser): string
    {
       $user = User::where('email', $socialUser->getEmail());

       if ($user) {
           $user->name = $socialUser->getName();
           $user->avatar = $socialUser->getAvatar();

           if ($user->save()) {
               auth('web')->login($user);

               return to_route('home')->with('success', 'Вы успешно зарегистрировались');

           } else {
               return to_route('register.showForm');
           }

       }

       throw new ModelNotFoundException('Model not found');
    }
}
