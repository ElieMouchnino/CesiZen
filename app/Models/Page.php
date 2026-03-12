<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'content',
        'is_published',
        'page_category_id',
    ];

    public function category()
    {
        return $this->belongsTo(PageCategory::class, 'page_category_id');
    }
}

