<?php

namespace App\Models;

use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    /** @use HasFactory<\Database\Factories\NoteFactory> */
    use HasFactory;

    use SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'content' => 'array',
    ];

    public function page()
    {
        // belongsTo(Page, 'coluna_na_tabela_notes', 'coluna_na_tabela_pages')
        return $this->belongsTo(Page::class, 'page_slug', 'slug');
    }
}
