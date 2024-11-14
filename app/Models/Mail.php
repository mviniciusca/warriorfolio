<?php

namespace App\Models;

use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

class Mail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    /**
     * Summary of unread
     * @return mixed
     */
    public static function unread(): array|Collection
    {
        return static::where('is_read', false)->get();
    }

    /**
     * Summary of important
     * @return mixed
     */
    public static function important(): array|Collection
    {
        return static::where('is_important', true)->get();
    }

    /**
     * Summary of chartInbox
     * @return array
     */
    public static function chartInbox()
    {
        $data = Trend::model(self::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfMonth(),
            )
            ->perMonth()
            ->count();
        $data = $data->map(fn (TrendValue $value) => $value->aggregate);
        $data = $data->take(3);
        $data = $data->toArray();

        return $data;
    }

    /**
     * Summary of counter
     * @return mixed
     */
    public static function counter(): int|string
    {
        if (static::count() >= 1000) {
            return round(static::count() / 1000, 1).'K';
        } elseif (static::count() >= 1000000) {
            return round(static::count() / 1000000, 1).'M';
        }

        return static::count();
    }
}
