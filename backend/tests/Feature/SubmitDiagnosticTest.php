<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\DiagnosticQuestion;
use App\Models\DiagnosticResultRule;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SubmitDiagnosticTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_submit_diagnostic_and_get_result(): void
    {
        $user = User::create([
            'name' => 'Elie',
            'email' => 'elie@diag.fr',
            'password' => bcrypt('password123'),
            'role' => 'user',
            'is_active' => 1,
        ]);

        $question1 = DiagnosticQuestion::create([
            'label' => 'Je me sens stressé',
            'sort_order' => 1,
            'is_active' => 1,
        ]);

        $question2 = DiagnosticQuestion::create([
            'label' => 'Je dors mal',
            'sort_order' => 2,
            'is_active' => 1,
        ]);

        DiagnosticResultRule::create([
            'min_score' => 0,
            'max_score' => 10,
            'title' => 'Stress faible',
            'message' => 'Votre niveau de stress semble faible.',
            'sort_order' => 1,
        ]);

        $response = $this->actingAs($user)
            ->from('/diagnostic')
            ->post('/diagnostic', [
                'question_' . $question1->id => 2,
                'question_' . $question2->id => 3,
            ]);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('diagnostic_submissions', [
            'user_id' => $user->id,
        ]);

        $this->assertDatabaseCount('diagnostic_answers', 2);
    }
}