<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use App\Serveces\Contract\Upload;

class UserController extends Controller
{
    public function index(User $user)
    {
        return view('profile.index', [
            'user' => $user->where('id', auth()->user()->getAuthIdentifier())
                ->firstOrFail()
        ]);
    }

    public function edit(User $user)
    {
        return view('profile.edit', [
            'user' => $user->where('id', auth()->user()->getAuthIdentifier())
                ->firstOrFail()
        ]);
    }

    public function update(ProfileRequest $request, Upload $upload)
    {
        $user = User::where('id', auth()->user()->getAuthIdentifier())
            ->firstOrFail();

        $validated = $request->validated();

        if ($request->hasFile('avatar')) {
            $validated['avatar'] = $upload->uploadImage($request->file('avatar'));
        }

        $user->update($validated);

        return to_route('profile.index')->with('success', 'Изменения сохранены');
    }

    public function destroy()
    {

    }
}
