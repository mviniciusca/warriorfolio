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
        Schema::create('cores', function (Blueprint $table) {
            $table->id();
            $table->boolean('header')->default(false);
            $table->boolean('footer')->default(true);
            $table->boolean('newsletter')->default(true);
            $table->boolean('clients')->default(true);
            $table->boolean('contact')->default(true);
            $table->boolean('hero')->default(true);
            $table->boolean('portfolio')->default(true);
            $table->boolean('about')->default(true);
            $table->foreignId('setting_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cores');
    }
};
