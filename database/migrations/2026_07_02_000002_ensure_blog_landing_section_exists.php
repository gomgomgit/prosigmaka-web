<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('landing_sections')->updateOrInsert(
            ['key' => 'blog'],
            [
                'label' => 'Blog',
                'sort_order' => 60,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
    }

    public function down(): void
    {
        DB::table('landing_sections')->where('key', 'blog')->delete();
    }
};
