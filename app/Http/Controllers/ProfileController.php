<?php

namespace App\Http\Controllers;

use App\Models\DiagnosticResultRule;
use App\Models\DiagnosticSubmission;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();

        $submissions = DiagnosticSubmission::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        foreach ($submissions as $submission) {
            $rule = DiagnosticResultRule::where('min_score', '<=', $submission->total_score)
                ->where('max_score', '>=', $submission->total_score)
                ->orderBy('sort_order')
                ->first();

            $submission->stress_level = $rule ? $rule->title : 'Non défini';
        }

        $chartSubmissions = DiagnosticSubmission::where('user_id', $user->id)
            ->orderBy('created_at')
            ->get();

        $chartLabels = $chartSubmissions->map(function ($submission) {
            return $submission->created_at->format('d/m');
        })->values();

        $chartScores = $chartSubmissions->pluck('total_score')->values();

        return view('profile.show', compact(
            'user',
            'submissions',
            'chartLabels',
            'chartScores'
        ));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/.*\S.*/'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
        ]);

        $user->update($validated);

        return redirect('/profile')->with('success', 'Profil mis à jour.');
    }
}