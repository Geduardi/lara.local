<?php declare(strict_types=1);


namespace App\Services;


use XmlParser;

class ParserService
{
    public array $parserLinks = [
        'https://news.yandex.ru/army.rss',
        'https://news.yandex.ru/auto.rss',
        'https://news.yandex.ru/music.rss',

    ];

    public function start(string $url)
    {
        $xml = XmlParser::load($url);

        return $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guide,description,pubData]'
            ],
        ]);
    }
}
