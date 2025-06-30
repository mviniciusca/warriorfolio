<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hero extends Model
{
    /** @use HasFactory<\Database\Factories\HeroFactory> */
    use HasFactory;

    use SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'content' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($hero) {
            if ($hero->is_active) {
                // Desativa todos os outros heroes quando este for ativado
                static::where('id', '!=', $hero->id)->update(['is_active' => false]);
            }
        });
    }
}
