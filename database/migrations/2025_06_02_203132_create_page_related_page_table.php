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
        Schema::create('page_related_page', function (Blueprint $table) {
            $table->foreignId('page_id')->constrained('pages')->onDelete('cascade');
            $table->foreignId('related_page_id')->constrained('pages')->onDelete('cascade');
            $table->primary(['page_id', 'related_page_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_related_page');
    }
};
