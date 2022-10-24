<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsingJob;
use App\Models\Resource;
use Illuminate\Http\RedirectResponse;

class ParserController extends Controller
{
    public function __invoke(Resource $resource): RedirectResponse
    {
        $urls = $resource->all();

        foreach ($urls as $url) {
            dispatch(new NewsParsingJob($url->url));
        }

        return back()->with('success', 'Новости добавлены в очередь');
    }
}
