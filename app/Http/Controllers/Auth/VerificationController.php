<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function getVerifyForm()
    {
        return view('auth.verify-email');
    }

    public function verifycationRequest(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return to_route('home');
    }

    public function repeatSendToMail(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Письмо отправлено повторно');
    }
}
