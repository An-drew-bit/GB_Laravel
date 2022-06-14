<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Serveces\Contract\Parser;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function __invoke(Request $request, Parser $parser)
    {
        dd($parser->setUrl('https://news.yandex.ru/army.rss')->parse());
    }
}
