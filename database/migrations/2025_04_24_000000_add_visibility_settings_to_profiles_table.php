<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->boolean('show_job_position')->default(true);
            $table->boolean('show_company')->default(true);
            $table->boolean('show_location')->default(true);
            $table->boolean('show_email')->default(true);
            $table->boolean('show_skills')->default(true);
            $table->boolean('show_social')->default(true);
            $table->boolean('show_resume')->default(true);
        });
    }

    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn([
                'show_job_position',
                'show_company',
                'show_location',
                'show_email',
                'show_skills',
                'show_social',
                'show_resume'
            ]);
        });
    }
};