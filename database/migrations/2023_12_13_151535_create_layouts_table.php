<?php

use App\Models\Setting;
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
            $table->foreignIdFor(Setting::class)->constrained()->cascadeOnDelete()->cascadeOnDelete();
            // Hero Section
            $table->json('hero');
            // Portfolio Section
            $table->json('portfolio');
            // About Section
            $table->json('about');
            // Contact Section
            $table->json('contact');
            // Clients Section
            $table->json('customer');
            // Newsletter Section
            $table->json('mailing');
            // Footer Section
            $table->json('footer')->nullable();
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
