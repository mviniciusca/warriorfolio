<?php

namespace App\Models;

use Filament\Pages\Page;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Z3d0X\FilamentFabricator\Models\Concerns\HandlesPageUrls;

class Note extends Model
{
    /** @use HasFactory<\Database\Factories\NoteFactory> */
    use HasFactory;

    use SoftDeletes;

    protected $table = 'pages';

    protected $guarded = [];

    protected $casts = [
        'blocks' => 'json',
    ];
}
