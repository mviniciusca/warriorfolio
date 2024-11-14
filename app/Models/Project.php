<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Summary of category
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Summary of published
     * @return mixed
     */
    public static function published(): array|Collection
    {
        return static::where('is_active', true)->get();
    }

    /**
     * Summary of chartData
     * @return mixed
     */
    public static function chartData(): array
    {
        return static::selectRaw('count(*) as count, monthname(created_at) as month')
            ->where('is_active', true)
            ->groupBy('month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }
}
