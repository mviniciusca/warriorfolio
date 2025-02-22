<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create(config('filament-fabricator.table_name', 'pages'), function (Blueprint $table) {
            $table->id();
            $table->string('title')->index();
            $table->string('slug')->unique();
            $table->string('layout')->default('default')->index();
            $table->boolean('is_active')->default(true);
            $table->json('blocks');
            $table->string('style')->default('default');
            $table->foreignId('parent_id')->nullable()->constrained('pages')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Post::class)->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists(config('filament-fabricator.table_name', 'pages'));
    }
};
