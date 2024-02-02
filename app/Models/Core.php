<?php

namespace App\Models;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Core extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function setting()
    {
        return $this->belongsTo(Setting::class);
    }
}
