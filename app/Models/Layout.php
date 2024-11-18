<?php

namespace App\Models;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Layout extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'about'     => 'array',
        'contact'   => 'array',
        'customer'  => 'array',
        'footer'    => 'array',
        'hero'      => 'array',
        'mailing'   => 'array',
        'portfolio' => 'array',
    ];

    /**
     * Summary of setting
     * @return BelongsTo
     */
    public function setting(): BelongsTo
    {
        return $this->belongsTo(Setting::class);
    }
}
