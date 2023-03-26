<?php

namespace App\Models;

use App\Models\Project\Tag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
    use HasFactory;
    protected $guarded = [];

    //get the tag for the project
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
