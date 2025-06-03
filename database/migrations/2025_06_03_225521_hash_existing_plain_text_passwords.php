<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Hash existing plain text passwords
        DB::table('pages')
            ->where('is_password_protected', true)
            ->whereNotNull('access_password')
            ->where('access_password', '!=', '')
            ->orderBy('id')
            ->chunk(100, function ($pages) {
                foreach ($pages as $page) {
                    // Check if password is already hashed (bcrypt hashes start with $2y$)
                    if (! str_starts_with($page->access_password, '$2y$')) {
                        DB::table('pages')
                            ->where('id', $page->id)
                            ->update([
                                'access_password' => Hash::make($page->access_password),
                                'updated_at'      => now(),
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
        // Note: This cannot be reversed as we cannot unhash passwords
        // This is intentionally left empty for security reasons
    }
};
