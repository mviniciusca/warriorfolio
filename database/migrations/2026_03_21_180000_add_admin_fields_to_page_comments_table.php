<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('page_comments', function (Blueprint $table) {
            $table->foreignId('user_id')
                ->nullable()
                ->after('parent_id')
                ->constrained('users')
                ->nullOnDelete();
            $table->boolean('is_admin')->default(false)->after('avatar_seed');
        });
    }

    public function down(): void
    {
        Schema::table('page_comments', function (Blueprint $table) {
            $table->dropConstrainedForeignId('user_id');
            $table->dropColumn('is_admin');
        });
    }
};

