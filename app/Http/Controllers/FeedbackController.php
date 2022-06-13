<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Models\{Feedback, User};

class FeedbackController extends Controller
{
    public function index(Feedback $feedback)
    {
        return view('front.feedback.index', [
            'feedbacks' => $feedback->with('user')->paginate(5)
        ]);
    }

    public function store(FeedbackRequest $request)
    {
        $user = User::findOrFail(auth()->id());

        $user->feedback()->create($request->validated());

        return back()->with('success', 'Отзыв успешно добавлен');
    }
}
