<?php

namespace App\Http\Controllers;

use App\Models\News;

class HomeController extends Controller
{
    public function __invoke()
    {
        $news = News::orderByDesc('created_at')->paginate(6);

        return view('home', compact('news'));
    }
}
