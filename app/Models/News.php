<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'category', 'short_description', 'description' => 'http://placehold.it/640x480', 'image', 'category_id'
    ];

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
