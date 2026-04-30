<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DiagnosticResultRule;
use Illuminate\Http\Request;

class DiagnosticResultRuleAdminController extends Controller
{
    public function index()
    {
        $rules = DiagnosticResultRule::orderBy('sort_order')->get();

        return view('admin.diagnostic.results.index', compact('rules'));
    }

    public function create()
    {
        return view('admin.diagnostic.results.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'min_score' => ['required', 'integer', 'min:0'],
            'max_score' => ['required', 'integer', 'min:0', 'gte:min_score'],
            'title' => ['required', 'string', 'max:255', 'regex:/.*\S.*/'],
            'message' => ['required', 'string', 'regex:/.*\S.*/'],
            'sort_order' => ['required', 'integer', 'min:0'],
        ]);

        DiagnosticResultRule::create($validated);

        return redirect('/admin/diagnostic/results')->with('success', 'Règle créée.');
    }

    public function edit(DiagnosticResultRule $rule)
    {
        return view('admin.diagnostic.results.edit', compact('rule'));
    }

    public function update(Request $request, DiagnosticResultRule $rule)
    {
        $validated = $request->validate([
            'min_score' => ['required', 'integer', 'min:0'],
            'max_score' => ['required', 'integer', 'min:0', 'gte:min_score'],
            'title' => ['required', 'string', 'max:255', 'regex:/.*\S.*/'],
            'message' => ['required', 'string', 'regex:/.*\S.*/'],
            'sort_order' => ['required', 'integer', 'min:0'],
        ]);

        $rule->update($validated);

        return redirect('/admin/diagnostic/results')->with('success', 'Règle modifiée.');
    }

    public function destroy(DiagnosticResultRule $rule)
    {
        $rule->delete();

        return redirect('/admin/diagnostic/results')->with('success', 'Règle supprimée.');
    }
}