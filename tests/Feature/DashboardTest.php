<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;


    /** @test **/
    public function it_should_be_allowed_to_see_inbox_on_dashboard(): void
    {

        $user = \App\Models\User::factory()->create();

        $response = $this->actingAs($user)->get(route('filament.admin.resources.mails.index'));

        $response->assertStatus(200);
        $response->assertSee('Inbox');
    }

    /** @test **/
    public function it_should_be_allowed_to_see_settings_on_dashboard(): void
    {

        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(route('filament.admin.resources.settings.edit', ['record' => 1]));
        $response->assertStatus(200);
        $response->assertSee('Settings');
    }

    /** @test **/
    public function it_should_be_allowed_to_see_profile_on_dashboard(): void
    {

        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(route('filament.admin.resources.profiles.index'));
        $response->assertStatus(200);
        $response->assertSee('Profile');
    }

    /** @test **/
    public function it_should_be_allowed_to_see_blog_posts_on_dashboard(): void
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(route('filament.admin.resources.posts.index'));
        $response->assertStatus(200);
        $response->assertSee('Notes');
    }

    /** @test **/
    public function it_should_be_allowed_to_see_projects_on_dashboard(): void
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(route('filament.admin.resources.projects.index'));
        $response->assertStatus(200);
        $response->assertSee('Projects');
    }

    /** @test **/
    public function it_should_be_allowed_to_see_categories_on_dashboard(): void
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(route('filament.admin.resources.categories.index'));
        $response->assertStatus(200);
        $response->assertSee('Categories');
    }

    /** @test **/
    public function it_should_be_allowed_to_see_customers_on_dashboard(): void
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(route('filament.admin.resources.customers.index'));
        $response->assertStatus(200);
        $response->assertSee('Customers');
    }

    /** @test **/
    public function it_should_be_allowed_to_see_subscribers_on_dashboard(): void
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(route('filament.admin.resources.newsletters.index'));
        $response->assertStatus(200);
        $response->assertSee('Subscribers');
    }

    /** @test **/
    public function it_should_be_allowed_to_see_website_pages_on_dashboard(): void
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(route('filament.admin.resources.pages.index'));
        $response->assertStatus(200);
        $response->assertSee('Pages');
    }

    /** @test **/
    public function it_should_be_allowed_to_see_hero_section_on_dashboard(): void
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(route('filament.admin.resources.heroes.index'));
        $response->assertStatus(200);
        $response->assertSee('Hero Section');
    }

    /** @test **/
    public function it_should_be_allowed_to_see_website_sections_on_dashboard(): void
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(route('filament.admin.resources.sections.index'));
        $response->assertStatus(200);
        $response->assertSee('Sections');
    }

    /** @test **/
    public function it_should_be_allowed_to_see_website_alerts_on_dashboard(): void
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(route('filament.admin.resources.alerts.index'));
        $response->assertStatus(200);
        $response->assertSee('Alerts');
    }

    /** @test **/
    public function it_should_be_allowed_to_see_slideshow_on_dashboard(): void
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(route('filament.admin.resources.slideshows.index'));
        $response->assertStatus(200);
        $response->assertSee('Slideshow');
    }

    /** @test **/
    public function it_should_be_allowed_to_see_activity_log_on_dashboard(): void
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(route('filament.admin.resources.activity-logs.index'));
        $response->assertStatus(200);
        $response->assertSee('Activity Log');
    }

    /** @test **/
    public function it_should_be_allowed_to_see_website_settings_on_dashboard(): void
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(route('filament.admin.resources.settings.edit', ['record' => 1]));
        $response->assertStatus(200);
        $response->assertSee('Settings');
    }

    /** @test **/
    public function it_should_be_allowed_to_see_website_logs_on_dashboard(): void
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get('admin/logs');
        $response->assertStatus(200);
        $response->assertSee('Log');
    }
}
