<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    /** @use HasFactory<\Database\Factories\NoteFactory> */
    use HasFactory;

    use SoftDeletes;

    protected $table = 'pages';

    protected $guarded = [];

    protected $casts = [
        'content' => 'array',
        'blocks'  => 'array',
    ];
}
