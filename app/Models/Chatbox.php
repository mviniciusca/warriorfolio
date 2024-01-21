<?php

namespace App\Models;

use PhpOffice\PhpSpreadsheet\Settings;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chatbox extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function settings()
    {
        return $this->belongsTo(Settings::class);
    }
}
