<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    public function index(User $users)
    {
        return view('admin.users.index', [
            'users' => $users->where('is_admin', '!=', 1)->get()
        ]);
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user
        ]);
    }

    public function update(User $user, UserRequest $request)
    {
        $user->update($request->validated());

        return to_route('admin.users.index')->with('success', 'Изменения сохранены');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return to_route('admin.users.index')->with('success', 'Пользователь успешно удален');
    }
}
