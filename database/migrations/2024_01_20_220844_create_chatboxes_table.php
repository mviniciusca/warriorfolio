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
        Schema::create('chatboxes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('setting_id')->constrained()->cascadeOnDelete();
            $table->string('message')->nullable();
            $table->string('telephone')->nullable();
            $table->boolean('visible')->default(false);
            $table->string('animation_style')->default('animate-pulse');
            $table->string('color')->default('#9000c7');
            $table->string('icon')->default('logo-whatsapp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chatboxes');
    }
};
