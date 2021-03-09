<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function all()
    {
        $objCategory = new Category();
        $categories = $objCategory->getCategories();
        return view('news.category', [
            'categories' => $categories,
        ]);
    }
}
