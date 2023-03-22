<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('localization')
                ->nullable();
            $table->string('job_position')
                ->nullable();
            $table->string('picture')
                ->nullable();
            $table->string('about')
                ->nullable();
            $table->string('skills')
                ->nullable();
            $table->string('github_link')
                ->nullable();
            $table->string('twitter_link')
                ->nullable();
            $table->string('linkedin_link')
                ->nullable();
            $table->string('dribbble_link')
                ->nullable();
            $table->string('instagram_link')
                ->nullable();
            $table->string('facebook_link')
                ->nullable();
            $table->string('medium_link')
                ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
