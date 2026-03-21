<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $tableName = config('filament-fabricator.table_name', 'pages');

        Schema::table($tableName, function (Blueprint $table) {
            $table->boolean('comments_enabled')->default(true);
        });
    }

    public function down(): void
    {
        $tableName = config('filament-fabricator.table_name', 'pages');

        Schema::table($tableName, function (Blueprint $table) {
            $table->dropColumn('comments_enabled');
        });
    }
};
