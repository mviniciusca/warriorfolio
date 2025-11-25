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
        Schema::table('projects', function (Blueprint $table) {
            // ⚠️ Passo crucial para o SQLite:
            // Remover o índice unique/chave única primeiro.
            $table->dropUnique('projects_slug_unique');

            // Agora, dropar as colunas.
            $table->dropColumn(['name', 'slug']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Adicionar as colunas de volta para reverter (importante para o rollback).
            $table->string('name')->nullable();
            $table->string('slug')->unique(); // Recria a chave única
        });
    }
};