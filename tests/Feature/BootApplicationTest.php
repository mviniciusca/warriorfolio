<?php

namespace Tests\Feature;

use App\Filament\Resources\MailResource;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BootApplicationTest extends TestCase
{
    /** @test **/
    public function it_should_see_landing_page(): void
    {
        $this->get('/')->assertStatus(200);
    }

    /** @test **/
    public function it_should_see_login_page(): void
    {
        $this->get(route('login'))->assertRedirect();
    }

    /** @test **/
    public function it_should_see_documentation_page(): void
    {
        $this->get('/docs')->assertStatus(200);
    }
}
