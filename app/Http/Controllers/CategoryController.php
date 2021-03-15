<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function all()
    {
        $categories = Category::all();
        return view('news.category', [
            'categories' => $categories,
        ]);
    }

//    public function show(Category $category)
//    {
//
//    }
}
