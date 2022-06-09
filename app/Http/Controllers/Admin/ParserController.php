<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsingJob;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function __invoke(Request $request, )
    {
        // сделать из базы

        $urls = [

        ];

        foreach ($urls as $url) {
            dispatch(new NewsParsingJob($url));
        }

        return back()->with('success', 'Новости добавлены в очередь');
    }
}
