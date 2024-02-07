<?php

namespace App\Models;

use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Newsletter extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Summary of counter
     * @return string
     */
    public static function counter(): string
    {
        if (self::count() >= 1000) {
            return round(self::count() / 1000, 1) . 'K';
        } elseif (self::count() >= 1000000) {
            return round(self::count() / 1000000, 1) . 'M';
        }
        return self::count();
    }

    /**
     * Summary of chartSubscribers
     * @return array
     */
    public static function chartSubscribers(): array
    {
        $data = Trend::model(\App\Models\Newsletter::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();
        $data = $data->map(fn(TrendValue $value) => $value->aggregate);
        $data = $data->take(-3);
        $data = $data->toArray();
        return $data;
    }
}
