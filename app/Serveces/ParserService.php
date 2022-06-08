<?php

namespace App\Serveces;

use App\Serveces\Contract\Parser;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements Parser
{
    protected string $url;

    public function setUrl(string $url): Parser
    {
        $this->url = $url;

        return $this;
    }

    public function parse(): array
    {
        $xml = XmlParser::load($this->url);

        return $xml->parse([
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
    }
}
