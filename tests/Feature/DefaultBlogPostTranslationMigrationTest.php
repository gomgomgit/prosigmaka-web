<?php

namespace Tests\Feature;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class DefaultBlogPostTranslationMigrationTest extends TestCase
{
    use RefreshDatabase;

    private const SLUG = 'membangun-transformasi-digital-yang-berkelanjutan';

    private const INDONESIAN_TITLE = 'Membangun Transformasi Digital yang Berkelanjutan';

    private const INDONESIAN_EXCERPT = 'Pendekatan praktis untuk menyelaraskan teknologi, talenta, dan proses bisnis.';

    private const INDONESIAN_CONTENT = '<p>Transformasi digital yang berhasil dimulai dari masalah bisnis yang jelas, bukan dari teknologi semata.</p><p>ProSigmaka membantu organisasi merancang roadmap, menyiapkan talenta, dan mengimplementasikan solusi teknologi yang terukur.</p>';

    private const ENGLISH_TITLE = 'Building Sustainable Digital Transformation';

    private const ENGLISH_EXCERPT = 'A practical approach to aligning technology, talent, and business processes.';

    private const ENGLISH_CONTENT = '<p>Successful digital transformation starts with a clearly defined business problem, not with technology alone.</p><p>ProSigmaka helps organizations design roadmaps, prepare talent, and implement measurable technology solutions.</p>';

    public function test_it_translates_the_unchanged_default_blog_post(): void
    {
        $this->insertPost(self::INDONESIAN_TITLE, self::INDONESIAN_EXCERPT, self::INDONESIAN_CONTENT);

        $this->migration()->up();

        $post = DB::table('posts')->where('slug', self::SLUG)->first();

        $this->assertSame(self::ENGLISH_TITLE, $post->title);
        $this->assertSame(self::ENGLISH_EXCERPT, $post->excerpt);
        $this->assertSame(self::ENGLISH_CONTENT, $post->content);
    }

    public function test_it_preserves_a_user_modified_default_blog_post(): void
    {
        $this->insertPost(self::INDONESIAN_TITLE, 'A custom excerpt', self::INDONESIAN_CONTENT);

        $this->migration()->up();

        $post = DB::table('posts')->where('slug', self::SLUG)->first();

        $this->assertSame(self::INDONESIAN_TITLE, $post->title);
        $this->assertSame('A custom excerpt', $post->excerpt);
    }

    public function test_rollback_restores_only_the_unchanged_english_translation(): void
    {
        $this->insertPost(self::ENGLISH_TITLE, self::ENGLISH_EXCERPT, self::ENGLISH_CONTENT);

        $this->migration()->down();

        $post = DB::table('posts')->where('slug', self::SLUG)->first();

        $this->assertSame(self::INDONESIAN_TITLE, $post->title);
        $this->assertSame(self::INDONESIAN_EXCERPT, $post->excerpt);
        $this->assertSame(self::INDONESIAN_CONTENT, $post->content);
    }

    private function insertPost(string $title, string $excerpt, string $content): void
    {
        DB::table('posts')->insert([
            'title' => $title,
            'slug' => self::SLUG,
            'excerpt' => $excerpt,
            'content' => $content,
            'status' => 'published',
            'published_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    private function migration(): Migration
    {
        return require database_path('migrations/2026_07_23_140339_translate_default_blog_post_to_english.php');
    }
}
