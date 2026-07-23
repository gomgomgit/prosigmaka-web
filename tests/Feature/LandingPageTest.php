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
        LandingSection::query()->updateOrCreate(['key' => 'home'], ['label' => 'Home', 'sort_order' => 5, 'is_active' => true]);
        LandingSection::query()->updateOrCreate(['key' => 'blog'], ['label' => 'Blog', 'sort_order' => 10, 'is_active' => true]);
        LandingSection::query()->create(['key' => 'services', 'label' => 'Services', 'sort_order' => 20, 'is_active' => true]);
        LandingSection::query()->create(['key' => 'clients', 'label' => 'Clients', 'sort_order' => 30, 'is_active' => false]);

        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('<html lang="en"', false);
        $response->assertSee('Latest', false);
        $response->assertSee('From ambition', false);
        $response->assertSee('We bring together engineering, talent, learning, and AI');
        $response->assertDontSee('Kami menyatukan');
        $response->assertDontSee('Built with teams', false);
    }

    public function test_published_posts_are_visible_but_drafts_are_hidden(): void
    {
        LandingSection::query()->updateOrCreate(['key' => 'blog'], ['label' => 'Blog', 'sort_order' => 10, 'is_active' => true]);

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

    public function test_published_posts_with_previously_excluded_slugs_are_visible(): void
    {
        LandingSection::query()->updateOrCreate(['key' => 'blog'], ['label' => 'Blog', 'sort_order' => 10, 'is_active' => true]);

        foreach ([
            'dsafsadffssa' => 'Previously Excluded First Post',
            'test-upload' => 'Previously Excluded Second Post',
        ] as $slug => $title) {
            Post::query()->create([
                'title' => $title,
                'slug' => $slug,
                'content' => '<p>Dummy content</p>',
                'status' => Post::STATUS_PUBLISHED,
                'published_at' => now(),
            ]);
        }

        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('Previously Excluded First Post');
        $response->assertSee('Previously Excluded Second Post');
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

        $this->get(route('blog.show', $published))
            ->assertOk()
            ->assertSee('data-site-header', false)
            ->assertSee('theme-toggle-btn', false)
            ->assertSee('id="main-content"', false)
            ->assertSee(route('landing').'#blog', false)
            ->assertDontSee('bg-slate-950', false)
            ->assertDontSee('prose-invert', false)
            ->assertDontSee('id="preloader"', false)
            ->assertDontSee('id="main-content" class="opacity-0', false);
        $this->get(route('blog.show', $draft))->assertNotFound();
    }
}
