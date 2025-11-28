<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StartupApplicationTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function it_should_redirect_to_login_when_accessing_admin(): void
    {
        $response = $this->get('/admin');

        $response->assertRedirect('/admin/login');
    }

    /** @test **/
    public function it_should_see_login_page(): void
    {
        $response = $this->get('/admin/login');

        $response->assertStatus(200);
        $response->assertSee('Login');
    }

    /** @test **/
    public function it_should_see_the_landing_page_on_startup(): void
    {

        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /** @test **/
    public function it_should_see_the_documentation_page_on_startup(): void
    {

        $response = $this->get('/docs');
        $response->assertStatus(200);
    }

    /** @test **/
    public function it_should_see_blog_on_startup(): void
    {

        $response = $this->get('/blog');
        $response->assertStatus(200);
    }

    /** @test
     * @var \App\Models\User $user
     * **/
    public function it_should_access_the_dashboard(): void
    {

        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('filament.admin.pages.dashboard'));
        $response->assertStatus(200);
    }

    /** @test **/
    public function it_should_deny_access_to_dashboard(): void
    {
        $response = $this->get(route('filament.admin.pages.dashboard'));
        $response->assertRedirect('/admin/login');
    }
}
