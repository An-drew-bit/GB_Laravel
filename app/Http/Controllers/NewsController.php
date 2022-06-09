<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Models\{Category, News};

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

    public function create()
    {
        return view('front.news.create');
    }

    public function store(NewsRequest $request)
    {
        return to_route('home')->with('success', 'Новость добавлена');
    }
}
