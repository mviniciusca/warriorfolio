<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'email', 'subject', 'body', 'is_newsletter', 'is_read', 'is_sent', 'is_important', 'is_draft', 'is_archived', 'is_deleted',
    ];
}
