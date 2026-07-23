<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('landing_sections')
            ->where('key', 'ai-agent')
            ->update([
                'label' => 'NEA AI',
                'updated_at' => now(),
            ]);
    }

    public function down(): void
    {
        DB::table('landing_sections')
            ->where('key', 'ai-agent')
            ->where('label', 'NEA AI')
            ->update([
                'label' => 'AI Assistant',
                'updated_at' => now(),
            ]);
    }
};
