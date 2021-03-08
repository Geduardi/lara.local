<?php

namespace App\Http\Controllers;

class CategoryController extends Controller
{
    public function all()
    {
        return view('news.category', [
            'categories' => $this->categories,
        ]);
    }
}
