<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * @param Request $request
     * @param string $categoryId
     * @return string
     */
    public function allByCategory(string $categoryId)
    {
        $objCategory = New Category();
        $category = $objCategory->getCategory($categoryId);
        if (empty($category)) {
            return  redirect('category');
        }
        $objNews = new News();
        $news = $objNews->getNewsByCategory($categoryId);
//        dd($news);
//        $news = array_filter($objNews->getNews(), function ($item) use ($categoryId) {
//            return $item['categoryId'] == $categoryId;
//        });

        return view('news.category_news', compact('news', 'category'));
    }

    /**
     * @param Request $request
     * @param string $id
     * @return string
     */
    public function one(string $id)
    {
//        if (empty($this->news[$id])) {
//            return redirect('category');
//        }

        $objNews = new News();
        $news = $objNews->getNewsOne($id);

        return view('news.news', compact('news'));
    }

    public function index(){
        $news = News::all();
        return view('news.index', compact('news'));
    }
}
