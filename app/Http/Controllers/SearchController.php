<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\News;

class SearchController extends Controller
{
    public function __invoke(SearchRequest $request, News $news)
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
