<?php

namespace Tests\Feature;

use App\Models\LandingSection;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LandingPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_landing_page_renders_active_sections_in_order(): void
    {
        LandingSection::query()->create(['key' => 'blog', 'label' => 'Blog', 'sort_order' => 10, 'is_active' => true]);
        LandingSection::query()->create(['key' => 'services', 'label' => 'Services', 'sort_order' => 20, 'is_active' => true]);
        LandingSection::query()->create(['key' => 'clients', 'label' => 'Clients', 'sort_order' => 30, 'is_active' => false]);

        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('Latest', false);
        $response->assertSee('Comprehensive', false);
        $response->assertDontSee('Trusted by', false);
    }

    public function test_published_posts_are_visible_but_drafts_are_hidden(): void
    {
        LandingSection::query()->create(['key' => 'blog', 'label' => 'Blog', 'sort_order' => 10, 'is_active' => true]);

        Post::query()->create([
            'title' => 'Published Insight',
            'slug' => 'published-insight',
            'content' => '<p>Published</p>',
            'status' => Post::STATUS_PUBLISHED,
            'published_at' => now(),
        ]);

        Post::query()->create([
            'title' => 'Draft Insight',
            'slug' => 'draft-insight',
            'content' => '<p>Draft</p>',
            'status' => Post::STATUS_DRAFT,
            'published_at' => now(),
        ]);

        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('Published Insight');
        $response->assertDontSee('Draft Insight');
    }

    public function test_blog_detail_only_allows_published_posts(): void
    {
        $published = Post::query()->create([
            'title' => 'Published Detail',
            'slug' => 'published-detail',
            'content' => '<p>Content</p>',
            'status' => Post::STATUS_PUBLISHED,
            'published_at' => now(),
        ]);

        $draft = Post::query()->create([
            'title' => 'Draft Detail',
            'slug' => 'draft-detail',
            'content' => '<p>Content</p>',
            'status' => Post::STATUS_DRAFT,
            'published_at' => now(),
        ]);

        $this->get(route('blog.show', $published))->assertOk();
        $this->get(route('blog.show', $draft))->assertNotFound();
    }
}
