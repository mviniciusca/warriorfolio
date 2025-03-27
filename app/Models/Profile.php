<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'social' => 'array',
    ];

    /**
     * Defines a relationship where the profile belongs to a user.
     *
     * @return BelongsTo The relationship instance linking the profile to a user.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
