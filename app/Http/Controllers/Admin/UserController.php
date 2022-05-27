<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index(User $users)
    {
        return view('admin.users.index', [
            'users' => $users->where('is_admin', 0)->get()
        ]);
    }

    public function destroy(User $users)
    {
        $users->delete();

        return to_route('admin.news.index')->with('success', 'Пользователь успешно удален');
    }
}
