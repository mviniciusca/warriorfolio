<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $pagesTable = config('filament-fabricator.table_name', 'pages');

        Schema::create('page_comments', function (Blueprint $table) use ($pagesTable) {
            $table->id();
            $table->foreignId('page_id')
                ->constrained($pagesTable)
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('parent_id')
                ->nullable()
                ->constrained('page_comments')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('author_name');
            $table->string('author_email');
            $table->text('body');
            $table->string('avatar_seed', 128);
            $table->string('status', 32)->default('pending')->index();
            $table->timestamp('moderated_at')->nullable();
            $table->foreignId('moderated_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();
            $table->timestamps();

            $table->index(['page_id', 'status', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('page_comments');
    }
};
