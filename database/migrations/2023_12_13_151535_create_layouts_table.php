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
        Schema::create('layouts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('setting_id')->constrained()->onDelete('cascade');
            // Hero Section
            $table->string('hero_section_title')->nullable();
            $table->string('hero_section_subtitle_text')->nullable();
            // Portfolio Section
            $table->string('portfolio_section_title')->nullable();
            $table->string('portfolio_section_subtitle_text')->nullable();
            // About Section
            $table->string('about_section_title')->nullable();
            $table->string('about_section_subtitle_text')->nullable();
            // Contact Section
            $table->string('contact_section_title')->nullable();
            $table->string('contact_section_subtitle_text')->nullable();
            // Clients Section
            $table->string('clients_section_title')->nullable();
            $table->string('clients_section_subtitle_text')->nullable();
            // Newsletter Section
            $table->string('newsletter_section_title')->nullable();
            $table->string('newsletter_section_subtitle_text')->nullable();
            $table->string('newsletter_section_image')->nullable();
            $table->string('newsletter_section_button_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layouts');
    }
};
