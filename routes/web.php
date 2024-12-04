<?php

use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

if (Schema::hasTable('settings')) {
$id = Setting::first(['id']);
}

Route::get('/login', function (): RedirectResponse {
    return redirect(route('filament.admin.auth.login'));
})->name('login');
