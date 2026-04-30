<?php

namespace App\Http\Controllers;

use App\Models\DiagnosticAnswer;
use App\Models\DiagnosticQuestion;
use App\Models\DiagnosticResultRule;
use App\Models\DiagnosticSubmission;
use App\Services\DiagnosticScoringService;
use Illuminate\Http\Request;

class DiagnosticController extends Controller
{
    public function showForm()
    {
        $questions = DiagnosticQuestion::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('diagnostic.form', compact('questions'));
    }

    public function submit(Request $request, DiagnosticScoringService $diagnosticScoringService)
    {
        $questions = DiagnosticQuestion::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $rules = [];

        foreach ($questions as $question) {
            $rules['question_' . $question->id] = ['required', 'integer', 'min:0', 'max:3'];
        }

        $validated = $request->validate($rules);

        $submission = DiagnosticSubmission::create([
            'user_id' => auth()->id(),
            'total_score' => 0,
        ]);

        $answers = [];

        foreach ($questions as $question) {
            $points = (int) $validated['question_' . $question->id];

            DiagnosticAnswer::create([
                'diagnostic_submission_id' => $submission->id,
                'diagnostic_question_id' => $question->id,
                'points' => $points,
            ]);

            $answers[] = $points;
        }

        $totalScore = $diagnosticScoringService->calculateTotalScore($answers);

        $submission->update([
            'total_score' => $totalScore,
        ]);

        return redirect('/diagnostic/result/' . $submission->id);
    }

    public function showResult(DiagnosticSubmission $submission)
    {
        $rule = DiagnosticResultRule::where('min_score', '<=', $submission->total_score)
            ->where('max_score', '>=', $submission->total_score)
            ->orderBy('sort_order')
            ->first();

        return view('diagnostic.result', compact('submission', 'rule'));
    }
}