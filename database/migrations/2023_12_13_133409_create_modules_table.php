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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->boolean('about')->default(1);
            $table->boolean('blog')->default(1);
            $table->boolean('footer')->default(1);
            $table->boolean('clients')->default(1);
            $table->boolean('contact')->default(1);
            $table->boolean('hero')->default(1);
            $table->boolean('newsletter')->default(1);
            $table->boolean('portfolio')->default(1);
            $table->boolean('services')->default(1);
            $table->foreignId('setting_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
