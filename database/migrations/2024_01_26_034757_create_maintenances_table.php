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
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(false);
            $table->boolean('is_discovery')->default(false);
            $table->string('content')->default('We are currently performing maintenance. Please check back soon.');
            $table->string('image')->nullable();
            $table->foreignId('setting_id')->constrained('settings')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenances');
    }
};
