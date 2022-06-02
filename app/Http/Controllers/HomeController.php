<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\ContactRequest;
use App\Mail\ContactForm;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function subscribe(ContactRequest $request)
    {
        Mail::to(auth()->user()->email)->send(new ContactForm($request->get('email')));

        return back()->with('success', 'Вы успешно пoдписались на рассылку');
    }
}
