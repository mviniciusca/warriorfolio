<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Migrate existing password data from JSON to dedicated fields
        DB::table('pages')->whereNotNull('advanced_settings')->orderBy('id')->chunk(100, function ($pages) {
            foreach ($pages as $page) {
                $advancedSettings = json_decode($page->advanced_settings, true);

                if (isset($advancedSettings['visibility'])) {
                    $isPasswordProtected = $advancedSettings['visibility']['is_password_protected'] ?? false;
                    $accessPassword = $advancedSettings['visibility']['access_password'] ?? null;

                    DB::table('pages')
                        ->where('id', $page->id)
                        ->update([
                            'is_password_protected' => $isPasswordProtected,
                            'access_password'       => $accessPassword,
                        ]);
                }
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Move data back to JSON if needed (optional)
        DB::table('pages')->whereNotNull('is_password_protected')->orderBy('id')->chunk(100, function ($pages) {
            foreach ($pages as $page) {
                $advancedSettings = json_decode($page->advanced_settings, true) ?? [];

                $advancedSettings['visibility']['is_password_protected'] = (bool) $page->is_password_protected;
                $advancedSettings['visibility']['access_password'] = $page->access_password;

                DB::table('pages')
                    ->where('id', $page->id)
                    ->update([
                        'advanced_settings' => json_encode($advancedSettings),
                    ]);
            }
        });
    }
};
