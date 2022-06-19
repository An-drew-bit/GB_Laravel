<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Models\{Category, News, User};

class NewsController extends Controller
{
    public function index(News $news)
    {
        return view('front.news.index', [
            'news' => $news->orderByDesc('created_at')->paginate(6)
        ]);
    }

    public function showNew(News $news, string $slug)
    {
        return view('front.news.view', [
            'news' => $news->where('slug', $slug)->first()
        ]);
    }

    public function create(Category $categories)
    {
        return view('front.news.create', [
            'categories' => $categories->pluck('title', 'id')->all()
        ]);
    }

    public function store(NewsRequest $request)
    {
        $user = User::findOrFail(auth('web')->id());

        $user->news()->create($request->validated());

        return to_route('home')->with('success', 'Новость добавлена');
    }
}
