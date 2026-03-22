<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * GitHub on default layout is rendered via Fabricator block `github-repositories`, not coupled sections.
     */
    public function up(): void
    {
        DB::table('sections')
            ->where('slug', 'github-repositories')
            ->update(['is_coupled' => false]);
    }

    public function down(): void
    {
        DB::table('sections')
            ->where('slug', 'github-repositories')
            ->update(['is_coupled' => true]);
    }
};
