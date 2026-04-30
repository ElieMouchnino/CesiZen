<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageCategoryAdminController extends Controller
{
    public function index()
    {
        $categories = PageCategory::with('parent')->orderBy('sort_order')->get();

        return view('admin.page-categories.index', compact('categories'));
    }

    public function create()
    {
        $parents = PageCategory::orderBy('sort_order')->get();

        return view('admin.page-categories.create', compact('parents'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/.*\S.*/'],
            'slug' => ['required', 'string', 'max:255', 'unique:page_categories,slug'],
            'parent_id' => ['nullable', 'exists:page_categories,id'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable'],
        ]);

        $validated['slug'] = Str::slug($validated['slug']);
        $validated['is_active'] = $request->has('is_active');

        PageCategory::create($validated);

        return redirect('/admin/page-categories')->with('success', 'Rubrique créée.');
    }

    public function edit(PageCategory $pageCategory)
    {
        $parents = PageCategory::where('id', '!=', $pageCategory->id)
            ->orderBy('sort_order')
            ->get();

        return view('admin.page-categories.edit', [
            'category' => $pageCategory,
            'parents' => $parents,
        ]);
    }

    public function update(Request $request, PageCategory $pageCategory)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/.*\S.*/'],
            'slug' => ['required', 'string', 'max:255', 'unique:page_categories,slug,' . $pageCategory->id],
            'parent_id' => ['nullable', 'exists:page_categories,id'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable'],
        ]);

        $validated['slug'] = Str::slug($validated['slug']);
        $validated['is_active'] = $request->has('is_active');

        $pageCategory->update($validated);

        return redirect('/admin/page-categories')->with('success', 'Rubrique modifiée.');
    }

    public function destroy(PageCategory $pageCategory)
    {
        $pageCategory->delete();

        return redirect('/admin/page-categories')->with('success', 'Rubrique supprimée.');
    }
}