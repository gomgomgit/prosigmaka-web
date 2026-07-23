<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SeoTest extends TestCase
{
    use RefreshDatabase;

    public function test_landing_page_has_search_and_social_metadata(): void
    {
        $response = $this->get('/');

        $response
            ->assertOk()
            ->assertSee('<meta name="robots" content="index, follow">', false)
            ->assertSee('<link rel="canonical" href="'.url('/').'">', false)
            ->assertSee('<meta property="og:type" content="website">', false)
            ->assertSee('<meta name="twitter:card" content="summary_large_image">', false)
            ->assertSee('"@type":"Organization"', false)
            ->assertSee('"@type":"WebSite"', false);
    }

    public function test_blog_post_has_article_metadata_and_structured_data(): void
    {
        $post = Post::query()->create([
            'title' => 'AI Transformation Guide',
            'slug' => 'ai-transformation-guide',
            'excerpt' => 'A practical guide to enterprise AI transformation.',
            'content' => '<p>Article content</p>',
            'featured_image' => 'posts/ai-guide.webp',
            'status' => Post::STATUS_PUBLISHED,
            'published_at' => now()->subDay(),
        ]);

        $response = $this->get(route('blog.show', $post));

        $response
            ->assertOk()
            ->assertSee('<title>AI Transformation Guide | ProSigmaka Insights</title>', false)
            ->assertSee('<meta name="description" content="A practical guide to enterprise AI transformation.">', false)
            ->assertSee('<meta property="og:type" content="article">', false)
            ->assertSee('<link rel="canonical" href="'.route('blog.show', $post).'">', false)
            ->assertSee('<meta property="article:published_time"', false)
            ->assertSee('"@type":"BlogPosting"', false)
            ->assertSee('"headline":"AI Transformation Guide"', false)
            ->assertSee(asset('storage/posts/ai-guide.webp'), false);
    }

    public function test_sitemap_only_contains_indexable_pages(): void
    {
        $published = Post::query()->create([
            'title' => 'Published Insight',
            'slug' => 'published-insight',
            'content' => '<p>Published</p>',
            'status' => Post::STATUS_PUBLISHED,
            'published_at' => now()->subDay(),
        ]);
        $draft = Post::query()->create([
            'title' => 'Draft Insight',
            'slug' => 'draft-insight',
            'content' => '<p>Draft</p>',
            'status' => Post::STATUS_DRAFT,
        ]);
        $scheduled = Post::query()->create([
            'title' => 'Scheduled Insight',
            'slug' => 'scheduled-insight',
            'content' => '<p>Scheduled</p>',
            'status' => Post::STATUS_PUBLISHED,
            'published_at' => now()->addDay(),
        ]);

        $response = $this->get(route('sitemap'));

        $response
            ->assertOk()
            ->assertHeader('Content-Type', 'application/xml; charset=UTF-8')
            ->assertSee(route('landing'), false)
            ->assertSee(route('blog.show', $published), false)
            ->assertDontSee(route('blog.show', $draft), false)
            ->assertDontSee(route('blog.show', $scheduled), false);
    }

    public function test_robots_file_points_to_sitemap_and_blocks_admin_crawling(): void
    {
        $response = $this->get(route('robots'));

        $response
            ->assertOk()
            ->assertHeader('Content-Type', 'text/plain; charset=UTF-8')
            ->assertSee('Allow: /', false)
            ->assertSee('Disallow: /admin/', false)
            ->assertSee('Sitemap: '.route('sitemap'), false);
    }
}
