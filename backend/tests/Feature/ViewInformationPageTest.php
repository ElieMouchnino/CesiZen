<?php

namespace Tests\Feature;

use App\Models\Page;
use App\Models\PageCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewInformationPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_view_published_information_page(): void
    {
        $category = PageCategory::create([
            'name' => 'Stress',
            'slug' => 'stress',
        ]);

        $page = Page::create([
            'title' => 'Comprendre le stress',
            'slug' => 'comprendre-le-stress',
            'content' => 'Contenu de test',
            'page_category_id' => $category->id,
            'is_published' => 1,
        ]);

        $response = $this->get('/pages/' . $page->slug);

        $response->assertStatus(200);
        $response->assertSee('Comprendre le stress');
        $response->assertSee('Contenu de test');
    }
}