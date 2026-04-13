<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_existing_user_can_login(): void
    {
        $user = User::create([
            'name' => 'Elie',
            'email' => 'elie@login.fr',
            'password' => bcrypt('password123'),
            'role' => 'user',
            'is_active' => 1,
        ]);

        $response = $this->post('/login', [
            'email' => 'elie@login.fr',
            'password' => 'password123',
        ]);

        $response->assertStatus(302);

        $this->assertAuthenticatedAs($user);
    }
}