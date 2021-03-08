<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected array $news = [
        '1' => [
            'id'         => '1',
            'title'      => 'Новость 1',
            'shortText'  => 'Короткое название 1',
            'fullText'   => 'Полная статья новости',
            'photo'      => 'http://placeimg.com/640/480/tech?random=1',
            'categoryId' => '1',
        ],
        '2' => [
            'id'         => '2',
            'title'      => 'Новость 2',
            'shortText'  => 'Короткое название 2',
            'fullText'   => 'Полная статья новости',
            'photo'      => 'http://placeimg.com/640/480/tech?random=2',
            'categoryId' => '1',
        ],
        '3' => [
            'id'         => '3',
            'title'      => 'Новость 3',
            'shortText'  => 'Короткое название 3',
            'fullText'   => 'Полная статья новости',
            'photo'      => 'http://placeimg.com/640/480/arch?random=1',
            'categoryId' => '2',
        ],
        '4' => [
            'id'         => '4',
            'title'      => 'Новость 4',
            'shortText'  => 'Короткое название 4',
            'fullText'   => 'Полная статья новости',
            'photo'      => 'http://placeimg.com/640/480/arch?random=2',
            'categoryId' => '2',
        ],
        '5' => [
            'id'         => '5',
            'title'      => 'Новость 5',
            'shortText'  => 'Короткое название 5',
            'fullText'   => 'Полная статья новости',
            'photo'      => 'http://placeimg.com/640/480/tech?random=1',
            'categoryId' => '3',
        ],
        '6' => [
            'id'         => '6',
            'title'      => 'Новость 6',
            'shortText'  => 'Короткое название 6',
            'fullText'   => 'Полная статья новости',
            'photo'      => 'http://placeimg.com/640/480/tech?random=2',
            'categoryId' => '3',
        ],
    ];

    protected array $categories = [
        '1' => [
            'id'          => '1',
            'name'        => 'Цифрове технологии',
            'description' => 'Компьютеры. Интернет.',
            'photo'       => 'http://placeimg.com/640/480/tech?random=1',
        ],
        '2' => [
            'id'          => '2',
            'name'        => 'Экономика',
            'description' => 'Цифровая энергетика. Макроэкономика.',
            'photo'       => 'http://placeimg.com/640/480/arch',
        ],
        '3' => [
            'id'          => '3',
            'name'        => 'Наука',
            'description' => 'Информатика. Космос. Технологии.',
            'photo'       => 'http://placeimg.com/640/480/tech?random=2',
        ],
        '4' => [
            'id'          => '4',
            'name'        => 'Люди',
            'description' => 'Мода. Происшествия. Истории.',
            'photo'       => 'http://placeimg.com/640/480/people',
        ],
    ];

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
