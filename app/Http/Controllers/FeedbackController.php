<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Models\{Feedback, User};
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\RedirectResponse;

class FeedbackController extends Controller
{
    public function index(Feedback $feedback): Application|Factory|View
    {
        return view('front.feedback.index', [
            'feedbacks' => $feedback->with('user')->paginate(5)
        ]);
    }

    public function store(FeedbackRequest $request): RedirectResponse
    {
        $user = User::findOrFail(auth()->id());

        $user->feedback()->create($request->validated());

        return back()->with('success', 'Отзыв успешно добавлен');
    }
}
