<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageAdminController extends Controller
{
    public function index()
    {
        $pages = Page::with('category')->orderBy('id', 'desc')->get();

        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        $categories = PageCategory::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('admin.pages.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255', 'regex:/.*\S.*/'],
            'slug' => ['required', 'string', 'max:255'],
            'page_category_id' => ['nullable', 'exists:page_categories,id'],
            'content' => ['required', 'string', 'regex:/.*\S.*/'],
            'is_published' => ['nullable'],
        ]);

        $validated['slug'] = Str::slug($validated['slug']);
        $validated['is_published'] = $request->has('is_published');

        Page::create($validated);

        return redirect('/admin/pages')->with('success', 'Page créée.');
    }

    public function edit(Page $page)
    {
        $categories = PageCategory::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('admin.pages.edit', compact('page', 'categories'));
    }

    public function update(Request $request, Page $page)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255', 'regex:/.*\S.*/'],
            'slug' => ['required', 'string', 'max:255'],
            'page_category_id' => ['nullable', 'exists:page_categories,id'],
            'content' => ['required', 'string', 'regex:/.*\S.*/'],
            'is_published' => ['nullable'],
        ]);

        $validated['slug'] = Str::slug($validated['slug']);
        $validated['is_published'] = $request->has('is_published');

        $page->update($validated);

        return redirect('/admin/pages')->with('success', 'Page mise à jour.');
    }

    public function destroy(Page $page)
    {
        $page->delete();

        return redirect('/admin/pages')->with('success', 'Page supprimée.');
    }
}