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
        // Remove password-related data from JSON since we now use dedicated fields
        DB::table('pages')->whereNotNull('advanced_settings')->orderBy('id')->chunk(100, function ($pages) {
            foreach ($pages as $page) {
                $advancedSettings = json_decode($page->advanced_settings, true);

                if (isset($advancedSettings['visibility'])) {
                    // Remove password fields from JSON
                    unset($advancedSettings['visibility']['is_password_protected']);
                    unset($advancedSettings['visibility']['access_password']);

                    // If visibility section is empty, remove it
                    if (empty($advancedSettings['visibility'])) {
                        unset($advancedSettings['visibility']);
                    }

                    DB::table('pages')
                        ->where('id', $page->id)
                        ->update([
                            'advanced_settings' => json_encode($advancedSettings),
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
        // Restore password data to JSON from dedicated fields
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
