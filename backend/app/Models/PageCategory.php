<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'sort_order',
        'is_active',
    ];

    public function parent()
    {
        return $this->belongsTo(PageCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(PageCategory::class, 'parent_id')->orderBy('sort_order');
    }

    public function pages()
    {
        return $this->hasMany(Page::class, 'page_category_id');
    }
}