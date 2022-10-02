<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Queries\NewsBuilder;
use App\Models\{Category, User};
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\RedirectResponse;

class NewsController extends Controller
{
    public function index(NewsBuilder $builder): Application|Factory|View
    {
        $news = $builder->getAllNews();

        return view('front.news.index', [
            'news' => $news
        ]);
    }

    public function showNew(NewsBuilder $builder, string $slug): Application|Factory|View
    {
        $news = $builder->getNewBySlug($slug);

        return view('front.news.view', [
            'news' => $news
        ]);
    }

    public function create(Category $categories): Application|Factory|View
    {
        return view('front.news.create', [
            'categories' => $categories->pluck('title', 'id')->all()
        ]);
    }

    public function store(NewsRequest $request): RedirectResponse
    {
        $user = User::findOrFail(auth('web')->id());

        $user->news()->create($request->validated());

        return to_route('home')->with('success', 'Новость добавлена');
    }
}
