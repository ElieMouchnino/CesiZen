<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\PageCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateInformationPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_information_page(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@page.fr',
            'password' => bcrypt('password123'),
            'role' => 'admin',
            'is_active' => 1,
        ]);

        $category = PageCategory::create([
            'name' => 'Bien-être',
            'slug' => 'bien-etre',
        ]);

        $response = $this->actingAs($admin)->post('/admin/pages', [
            'title' => 'Nouvelle page',
            'slug' => 'nouvelle-page',
            'content' => 'Contenu page admin',
            'page_category_id' => $category->id,
            'is_published' => 1,
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('pages', [
            'title' => 'Nouvelle page',
            'slug' => 'nouvelle-page',
        ]);
    }
}