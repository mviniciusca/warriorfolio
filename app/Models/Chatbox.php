<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use PhpOffice\PhpSpreadsheet\Settings;

class Chatbox extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the settings associated with the chatbox.
     *
     * @return BelongsTo
     */
    public function settings(): BelongsTo
    {
        return $this->belongsTo(Settings::class);
    }
}
