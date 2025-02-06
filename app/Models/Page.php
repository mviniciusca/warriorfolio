<?php

namespace App\Models;

use App\Models\Note;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function note()
    {
        // hasOne(Nota, 'coluna_na_tabela_notes', 'coluna_na_tabela_pages')
        return $this->hasOne(Note::class, 'page_slug', 'slug');
    }
}
