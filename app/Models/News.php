<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    public function getNews()
    {
        return DB::table('news')
            ->get();
    }

    public function getNewsOne(int $id)
    {
        return DB::table('news')->find($id);
    }

    public function getNewsByCategory(int $category_id)
    {
        return DB::table('news')->get()->where('category_id', $category_id);
    }
}
