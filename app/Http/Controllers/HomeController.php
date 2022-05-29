<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $news = News::orderByDesc('created_at')->paginate(6);

        return view('home', compact('news'));
    }
}
