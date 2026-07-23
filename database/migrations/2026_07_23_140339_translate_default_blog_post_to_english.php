<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('posts')
            ->where('slug', 'membangun-transformasi-digital-yang-berkelanjutan')
            ->where('title', 'Membangun Transformasi Digital yang Berkelanjutan')
            ->where('excerpt', 'Pendekatan praktis untuk menyelaraskan teknologi, talenta, dan proses bisnis.')
            ->where('content', '<p>Transformasi digital yang berhasil dimulai dari masalah bisnis yang jelas, bukan dari teknologi semata.</p><p>ProSigmaka membantu organisasi merancang roadmap, menyiapkan talenta, dan mengimplementasikan solusi teknologi yang terukur.</p>')
            ->update([
                'title' => 'Building Sustainable Digital Transformation',
                'excerpt' => 'A practical approach to aligning technology, talent, and business processes.',
                'content' => '<p>Successful digital transformation starts with a clearly defined business problem, not with technology alone.</p><p>ProSigmaka helps organizations design roadmaps, prepare talent, and implement measurable technology solutions.</p>',
                'updated_at' => now(),
            ]);
    }

    public function down(): void
    {
        DB::table('posts')
            ->where('slug', 'membangun-transformasi-digital-yang-berkelanjutan')
            ->where('title', 'Building Sustainable Digital Transformation')
            ->where('excerpt', 'A practical approach to aligning technology, talent, and business processes.')
            ->where('content', '<p>Successful digital transformation starts with a clearly defined business problem, not with technology alone.</p><p>ProSigmaka helps organizations design roadmaps, prepare talent, and implement measurable technology solutions.</p>')
            ->update([
                'title' => 'Membangun Transformasi Digital yang Berkelanjutan',
                'excerpt' => 'Pendekatan praktis untuk menyelaraskan teknologi, talenta, dan proses bisnis.',
                'content' => '<p>Transformasi digital yang berhasil dimulai dari masalah bisnis yang jelas, bukan dari teknologi semata.</p><p>ProSigmaka membantu organisasi merancang roadmap, menyiapkan talenta, dan mengimplementasikan solusi teknologi yang terukur.</p>',
                'updated_at' => now(),
            ]);
    }
};
