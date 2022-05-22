<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;

class NewsController extends Controller
{
    public function create()
    {
        return view('front.news.create');
    }

    public function store(NewsRequest $request)
    {
        return to_route('home')->with('success', 'Статья добавлена');
    }
}
