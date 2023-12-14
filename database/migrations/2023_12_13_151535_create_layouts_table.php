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
            $table->string('hero_section_title')->nullable();
            $table->string('hero_section_subtitle_text')->nullable();
            $table->string('portfolio_section_title')->nullable();
            $table->string('portfolio_section_subtitle_text')->nullable();
            $table->string('about_section_title')->nullable();
            $table->string('about_section_subtitle_text')->nullable();
            $table->string('contact_section_title')->nullable();
            $table->string('contact_section_subtitle_text')->nullable();
            $table->string('clients_section_text')->nullable();
            $table->string('clients_section_subtitle_text')->nullable();
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
