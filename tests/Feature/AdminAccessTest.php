<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_access_admin_pages(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@test.fr',
            'password' => bcrypt('password123'),
            'role' => 'admin',
            'is_active' => 1,
        ]);

        $response = $this->actingAs($admin)->get('/admin/pages');

        $response->assertStatus(200);
    }

    public function test_standard_user_cannot_access_admin_pages(): void
    {
        $user = User::create([
            'name' => 'User',
            'email' => 'user@test.fr',
            'password' => bcrypt('password123'),
            'role' => 'user',
            'is_active' => 1,
        ]);

        $response = $this->actingAs($user)->get('/admin/pages');

        $response->assertStatus(403);
    }
}