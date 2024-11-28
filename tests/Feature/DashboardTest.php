<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    /** @test **/
    public function it_should_redirect_to_login_page(): void
    {
        Auth::logout();
        $this->get(route('filament.admin.pages.dashboard'))->assertRedirect();
    }

    /** @test **/
    public function it_should_access_dashboard_page(): void
    {
        $this->get(route('filament.admin.pages.dashboard'))->assertSuccessful();
    }
}
