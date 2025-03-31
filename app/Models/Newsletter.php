<?php

namespace App\Models;

use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get a formatted count of newsletter subscriptions.
     *
     * Formats the count in 'K' (thousands) or 'M' (millions) if applicable.
     *
     * @return string The formatted subscription count.
     */
    public static function counter(): string
    {
        $count = self::count();

        return $count >= 1_000_000
            ? round($count / 1_000_000, 1).'M'
            : ($count >= 1_000
                ? round($count / 1_000, 1).'K'
                : (string) $count);
    }

    /**
     * Generate a chart data array for monthly newsletter subscriptions.
     *
     * Retrieves the count of subscriptions per month for the current year
     * and returns the data as an array.
     *
     * @return array The subscription counts for the last 12 months.
     */
    public static function chartSubscribers(): array
    {
        $data = Trend::model(self::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfMonth(),
            )
            ->perMonth()
            ->count();
        $data = $data->map(fn (TrendValue $value) => $value->aggregate);
        $data = $data->take(12);
        $data = $data->toArray();

        return $data;
    }
}
