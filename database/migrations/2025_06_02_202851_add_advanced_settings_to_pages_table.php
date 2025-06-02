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
            // Visibility & Access
            $table->timestamp('publish_at')->nullable();
            $table->timestamp('expire_at')->nullable();
            $table->boolean('is_password_protected')->default(false);
            $table->string('access_password')->nullable();

            // Page Structure fields removed (functionality already exists in the system)

            // Page Behavior
            $table->string('redirect_url')->nullable();
            $table->string('redirect_type')->nullable();
            $table->boolean('open_in_new_tab')->default(true);

            // Display Options
            $table->boolean('show_breadcrumbs')->default(true);
            $table->boolean('show_title')->default(true);
            $table->string('sidebar_position')->default('none');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn([
                'publish_at',
                'expire_at',
                'is_password_protected',
                'access_password',
                'redirect_url',
                'redirect_type',
                'open_in_new_tab',
                'show_breadcrumbs',
                'show_title',
                'sidebar_position',
            ]);
        });
    }
};
