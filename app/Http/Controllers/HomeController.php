<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\ContactRequest;
use App\Mail\ContactForm;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index(): Application|Factory|View
    {
        return view('home');
    }

    public function subscribe(ContactRequest $request): RedirectResponse
    {
        Mail::to(auth()->user()->email)->send(new ContactForm($request->get('email')));

        return back()->with('success', 'Вы успешно пoдписались на рассылку');
    }
}
