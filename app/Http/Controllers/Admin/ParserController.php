<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function __invoke(Request $request)
    {
        $xml = XmlParser::load('https://news.yandex.ru/army.rss');

        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'lastBuildDate' => [
                'uses' => 'channel.lastBuildDate'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ]
        ]);

        dump($data);
    }
}
