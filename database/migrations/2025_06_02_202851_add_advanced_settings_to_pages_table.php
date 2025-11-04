<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            // Add a JSON column for all advanced settings
            $table->json('advanced_settings')->nullable();

            // Keep separate timestamp columns for database queries/indexing efficiency
            $table->timestamp('publish_at')->nullable();
            $table->timestamp('expire_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn([
                'advanced_settings',
                'publish_at',
                'expire_at',
            ]);
        });
    }
};
