<?php

namespace App\Serveces;

use App\Models\News;
use App\Serveces\Contract\Parser;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements Parser
{
    protected string $url;
    protected News $news;

    public function setUrl(string $url): Parser
    {
        $this->url = $url;

        return $this;
    }

    public function parse(): void
    {
        $xml = XmlParser::load($this->url);

        $data = $xml->parse([
            'news' => [
                'uses' => 'channel.item[title,description,pubDate]',
            ]
        ]);

        foreach ($data['news'] as $key => $value) {
            $this->news = new News();

            $this->news->title = $value['title'];
            $this->news->description = $value['description'];
            $this->news->created_at = $value['pubDate'];

            $this->news->save();
        }
    }
}
