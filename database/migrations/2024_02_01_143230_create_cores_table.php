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
            $table->boolean('header')->default(true);
            $table->boolean('footer')->default(true);
            $table->boolean('newsletter')->default(false);
            $table->boolean('clients')->default(false);
            $table->boolean('contact')->default(false);
            $table->boolean('hero')->default(false);
            $table->boolean('portfolio')->default(false);
            $table->boolean('about')->default(false);
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
