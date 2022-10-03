<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    public function index(User $users): Application|Factory|View
    {
        return view('admin.users.index', [
            'users' => $users->where('is_admin', '!=', 1)->get()
        ]);
    }

    public function edit(User $user): Application|Factory|View
    {
        return view('admin.users.edit', [
            'user' => $user
        ]);
    }

    public function update(User $user, UserRequest $request): RedirectResponse
    {
        $user->update($request->validated());

        return to_route('admin.users.index')->with('success', 'Изменения сохранены');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return to_route('admin.users.index')->with('success', 'Пользователь успешно удален');
    }
}
