<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\News;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};

class SearchController extends Controller
{
    public function __invoke(SearchRequest $request, News $news): Application|Factory|View
    {
        $search = $request->get('search');

        return view('front.news.search', [
            'news' => $news->like($search)
                ->with('category')
                ->paginate(5),
            'search' => $search
        ]);
    }
}
