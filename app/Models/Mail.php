<?php

namespace App\Models;

use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mail extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Summary of unread
     * @return mixed
     */
    public static function unread()
    {
        return static::where('is_read', false)->get();
    }

    /**
     * Summary of important
     * @return mixed
     */
    public static function important()
    {
        return static::where('is_important', true)->get();
    }

    /**
     * Summary of chartInbox
     * @return array
     */
    public static function chartInbox()
    {
        $data = Trend::model(\App\Models\Mail::class)
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


    /**
     * Summary of counter
     * @return mixed
     */
    public static function counter()
    {
        if (static::count() >= 1000) {
            return round(static::count() / 1000, 1) . 'K';
        } elseif (static::count() >= 1000000) {
            return round(static::count() / 1000000, 1) . 'M';
        }
        return static::count();
    }

}
