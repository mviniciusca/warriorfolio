<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Z3d0X\FilamentFabricator\Models\Concerns\HandlesPageUrls;
use Z3d0X\FilamentFabricator\Models\Contracts\Page as Contract;
use Z3d0X\FilamentFabricator\Models\Page;

class Post extends Page implements Contract
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    use HandlesPageUrls;

    public function __construct(array $attributes = [])
    {
        if (blank($this->table)) {
            $this->setTable(config('filament-fabricator.table_name', 'pages'));
        }

        parent::__construct($attributes);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
