<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\PageCategory;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::where('is_published', true)->get();

        return view('pages.index', compact('pages'));
    }

    public function show($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();

        return view('pages.show', compact('page'));
    }

    public function category($slug)
    {
        $category = PageCategory::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();
    
        $pages = $category->pages()
            ->where('is_published', true)
            ->get();
    
        return view('pages.category', compact('category', 'pages'));
    }
}