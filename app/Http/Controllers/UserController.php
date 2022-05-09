<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    public function store(UserRequest $request)
    {
        $validated = $request->validated();
    }

    public function login(UserRequest $request)
    {

    }

    public function loginIn()
    {
        return view('user.login');
    }

    public function logout()
    {
        Auth::logout();

        to_route('login.create');
    }
}
