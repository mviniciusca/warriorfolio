<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends \Z3d0X\FilamentFabricator\Models\Page
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
