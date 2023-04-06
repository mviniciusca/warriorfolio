<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mail extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getShortMessageAttribute()
    {
        return Str::limit($this->message, 50);
    }

    public function getShortSubjectAttribute()
    {
        return Str::limit($this->subject, 50);
    }
}
