<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\ProfileRequest;
use App\Serveces\Contract\Upload;

class UserController extends Controller
{
    public function index(User $user)
    {
        return view('profile.index', [
            'user' => $user->current(auth()->user()->getAuthIdentifier())
        ]);
    }

    public function edit(User $user)
    {
        return view('profile.edit', [
            'user' => $user->current(auth()->user()->getAuthIdentifier())
        ]);
    }

    public function update(ProfileRequest $request, Upload $upload)
    {
        $user = User::current(auth()->user()->getAuthIdentifier());

        $validated = $request->validated();

        if ($request->hasFile('avatar')) {
            $validated['avatar'] = $upload->uploadImage($request->file('avatar'));
        }

        $user->update($validated);

        return to_route('profile.index')->with('success', 'Изменения сохранены');
    }

    public function destroy()
    {
        $user = User::current(auth()->user()->getAuthIdentifier());

        $user->delete();

        return to_route('home')->with('success', 'Вы успешно удалили свой аккаунт');
    }
}
