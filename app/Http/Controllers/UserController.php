<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Queries\UserBuilder;
use App\Serveces\Contract\Upload;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function index(UserBuilder $builder): Application|Factory|View
    {
        $user = $builder->getCurrentUser(auth()->user()->getAuthIdentifier());

        return view('profile.index', [
            'user' => $user
        ]);
    }

    public function edit(UserBuilder $builder): Application|Factory|View
    {
        $user = $builder->getCurrentUser(auth()->user()->getAuthIdentifier());

        return view('profile.edit', [
            'user' => $user
        ]);
    }

    public function update(ProfileRequest $request, Upload $upload, UserBuilder $builder): RedirectResponse
    {
        $user = $builder->getCurrentUser(auth()->user()->getAuthIdentifier());

        $user->update($this->validated($request, $upload, 'avatar', 'avatars'));

        return to_route('profile.index')->with('success', 'Изменения сохранены');
    }

    public function destroy(UserBuilder $builder): RedirectResponse
    {
        $user = $builder->getCurrentUser(auth()->user()->getAuthIdentifier());

        $user->delete();

        return to_route('home')->with('success', 'Вы успешно удалили свой аккаунт');
    }
}
