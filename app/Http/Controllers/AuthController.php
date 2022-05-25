<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.registerForm');
    }

    public function store(AuthRequest $request)
    {

    }

    public function showLoginForm()
    {
        return view('auth.loginForm');
    }

    public function login(AuthRequest $request)
    {

    }

    public function logout()
    {
        Auth::logout();

        return to_route('home');
    }
}
