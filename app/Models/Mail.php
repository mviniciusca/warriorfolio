<?php

namespace App\Models;

use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

/**
 * Class Mail
 *
 * Represents a mail model with various utility methods for querying and analyzing mail data.
 */
class Mail extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Retrieve all unread mails.
     *
     * @return Collection|array A collection or array of unread mails.
     */
    public static function unread(): array|Collection
    {
        return static::where('is_read', false)->get();
    }

    /**
     * Retrieve all important mails.
     *
     * @return Collection|array A collection or array of important mails.
     */
    public static function important(): array|Collection
    {
        return static::where('is_important', true)->get();
    }

    /**
     * Generate a chart of inbox data for the current year up to the current month.
     *
     * @return array An array of aggregated data for the inbox chart.
     */
    public static function chartInbox(): array
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
     * Get a formatted count of all mails.
     *
     * If the count is 1000 or more, it is formatted as 'K' (thousands).
     * If the count is 1,000,000 or more, it is formatted as 'M' (millions).
     *
     * @return int|string The formatted count of mails.
     */
    public static function counter(): int|string
    {
        $count = static::count();

        return $count >= 1000000
            ? round($count / 1000000, 1).'M'
            : ($count >= 1000
            ? round($count / 1000, 1).'K'
            : $count);
    }
}
