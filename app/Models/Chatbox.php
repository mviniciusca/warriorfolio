<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use PhpOffice\PhpSpreadsheet\Settings;

class Chatbox extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Summary of settings
     * @return BelongsTo
     */
    public function settings(): BelongsTo
    {
        return $this->belongsTo(Settings::class);
    }
}
