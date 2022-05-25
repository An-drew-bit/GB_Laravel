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
        $data = $request->only(['title', 'author', 'content', 'image']);

        file_put_contents('fedback.txt', json_encode($data), FILE_APPEND);

        return to_route('news.create')->with('success', 'Данные сохранены');
    }
}
