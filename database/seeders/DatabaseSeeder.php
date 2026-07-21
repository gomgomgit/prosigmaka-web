<?php

namespace Database\Seeders;

use App\Models\LandingSection;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        collect([
            ['key' => 'home', 'label' => 'Home', 'sort_order' => 10],
            ['key' => 'clients', 'label' => 'Clients', 'sort_order' => 20],
            ['key' => 'services', 'label' => 'Services', 'sort_order' => 30],
            ['key' => 'case-study', 'label' => 'Case Study & Testimonials', 'sort_order' => 40],
            ['key' => 'ai-agent', 'label' => 'AI Assistant', 'sort_order' => 50],
            ['key' => 'blog', 'label' => 'Blog', 'sort_order' => 60],
        ])->each(fn (array $section) => LandingSection::query()->updateOrCreate(
            ['key' => $section['key']],
            $section + ['is_active' => true],
        ));

        User::query()->firstOrCreate(
            ['email' => 'admin@prosigmaka.com'],
            [
                'name' => 'Admin',
                'password' => 'psmadmin',
                'email_verified_at' => now(),
            ]
        );

        Post::query()->firstOrCreate(
            ['slug' => 'membangun-transformasi-digital-yang-berkelanjutan'],
            [
                'title' => 'Membangun Transformasi Digital yang Berkelanjutan',
                'excerpt' => 'Pendekatan praktis untuk menyelaraskan teknologi, talenta, dan proses bisnis.',
                'content' => '<p>Transformasi digital yang berhasil dimulai dari masalah bisnis yang jelas, bukan dari teknologi semata.</p><p>ProSigmaka membantu organisasi merancang roadmap, menyiapkan talenta, dan mengimplementasikan solusi teknologi yang terukur.</p>',
                'status' => Post::STATUS_PUBLISHED,
                'published_at' => now(),
            ],
        );
    }
}
