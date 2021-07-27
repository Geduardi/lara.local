<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Services\ParserService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ParserController extends Controller
{
    public function __invoke(ParserService $service)
    {
//        dd($service->start('https://news.yandex.ru/army.rss'));
        foreach ($service->parserLinks as $link){
            $categoryXml = $service->start($link);
            $categoryXml['slug'] = Str::slug($categoryXml['title']);
            $category = Category::create($categoryXml);
            foreach ($categoryXml['news'] as $newsXml){
                if (!isset($newsXml['short_description'])){
                    $newsXml['short_description'] = $newsXml['description'];
                }
                $newsXml['category_id'] = $category->id;
                News::create($newsXml);
            }
        }


    }
}
