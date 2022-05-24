<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\Auth\{AuthRequest, RegisterRequest};

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.registerForm');
    }

    public function store(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if ($user) {
            auth('web')->login($user);
        }

        return to_route('home')->with('success', 'Вы успешно зарегистрировались');
    }

    public function showLoginForm()
    {
        return view('auth.loginForm');
    }

    public function login(AuthRequest $request)
    {
        if (auth('web')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            session()->flash('success', 'Вы успешно вошли');

            if (auth()->user()->is_admin) {
                return to_route('home'); // когда будет админка туда

            } else {
                return to_route('home');
            }
        }

        return to_route('login')->with('error', 'Не правильно введен Логин или Пароль');
    }

    public function logout()
    {
        auth('web')->logout();

        return to_route('home');
    }
}
