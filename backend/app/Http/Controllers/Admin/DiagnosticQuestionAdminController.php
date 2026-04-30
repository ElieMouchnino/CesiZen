<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DiagnosticQuestion;
use Illuminate\Http\Request;

class DiagnosticQuestionAdminController extends Controller
{
    public function index()
    {
        $questions = DiagnosticQuestion::orderBy('sort_order')->get();

        return view('admin.diagnostic.questions.index', compact('questions'));
    }

    public function create()
    {
        return view('admin.diagnostic.questions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'label' => ['required', 'string', 'max:255', 'regex:/.*\S.*/'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable'],
        ]);

        $validated['is_active'] = $request->has('is_active');

        DiagnosticQuestion::create($validated);

        return redirect('/admin/diagnostic/questions')->with('success', 'Question créée.');
    }

    public function edit(DiagnosticQuestion $question)
    {
        return view('admin.diagnostic.questions.edit', compact('question'));
    }

    public function update(Request $request, DiagnosticQuestion $question)
    {
        $validated = $request->validate([
            'label' => ['required', 'string', 'max:255', 'regex:/.*\S.*/'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable'],
        ]);

        $validated['is_active'] = $request->has('is_active');

        $question->update($validated);

        return redirect('/admin/diagnostic/questions')->with('success', 'Question modifiée.');
    }

    public function destroy(DiagnosticQuestion $question)
    {
        $question->delete();

        return redirect('/admin/diagnostic/questions')->with('success', 'Question supprimée.');
    }
}