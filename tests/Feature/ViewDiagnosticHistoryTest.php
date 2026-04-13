<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\DiagnosticSubmission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewDiagnosticHistoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_view_diagnostic_history(): void
    {
        $user = User::create([
            'name' => 'Elie',
            'email' => 'elie@history.fr',
            'password' => bcrypt('password123'),
            'role' => 'user',
            'is_active' => 1,
        ]);

        DiagnosticSubmission::create([
            'user_id' => $user->id,
            'total_score' => 5,
        ]);

        $response = $this->actingAs($user)->get('/profile');

        $response->assertStatus(200);
        $response->assertSee('5');
    }
}