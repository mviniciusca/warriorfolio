<?php

namespace Tests\Feature;

use App\Filament\Resources\AlertResource;
use App\Filament\Resources\CategoryResource;
use App\Filament\Resources\CustomerResource;
use App\Filament\Resources\HeroResource;
use App\Filament\Resources\MailResource;
use App\Filament\Resources\NewsletterResource;
use App\Filament\Resources\PageResource;
use App\Filament\Resources\PostResource;
use App\Filament\Resources\ProfileResource;
use App\Filament\Resources\ProjectResource;
use App\Filament\Resources\SectionResource;
use App\Filament\Resources\SettingResource;
use App\Filament\Resources\SlideshowResource;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Z3d0X\FilamentLogger\Resources\ActivityResource;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function it_should_be_allowed_to_see_inbox_on_dashboard(): void
    {

        $user = \App\Models\User::factory()->create();

        $response = $this->actingAs($user)->get(MailResource::getUrl('index'));

        $response->assertStatus(200);
        $response->assertSee('Inbox');
    }

    /** @test **/
    public function it_should_be_allowed_to_see_settings_on_dashboard(): void
    {

        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(SettingResource::getUrl('edit', ['record' => 1]));
        $response->assertStatus(200);
        $response->assertSee('Settings');
    }

    /** @test **/
    public function it_should_be_allowed_to_see_profile_on_dashboard(): void
    {

        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(ProfileResource::getUrl('index'));
        $response->assertStatus(200);
        $response->assertSee('Profile');
    }

    /** @test **/
    public function it_should_be_allowed_to_see_blog_posts_on_dashboard(): void
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(PostResource::getUrl('index'));
        $response->assertStatus(200);
        $response->assertSee('Notes');
    }

    /** @test **/
    public function it_should_be_allowed_to_see_projects_on_dashboard(): void
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(ProjectResource::getUrl('index'));
        $response->assertStatus(200);
        $response->assertSee('Projects');
    }

    /** @test **/
    public function it_should_be_allowed_to_see_categories_on_dashboard(): void
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(CategoryResource::getUrl('index'));
        $response->assertStatus(200);
        $response->assertSee('Categories');
    }

    /** @test **/
    public function it_should_be_allowed_to_see_customers_on_dashboard(): void
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(CustomerResource::getUrl('index'));
        $response->assertStatus(200);
        $response->assertSee('Customers');
    }

    /** @test **/
    public function it_should_be_allowed_to_see_subscribers_on_dashboard(): void
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(NewsletterResource::getUrl('index'));
        $response->assertStatus(200);
        $response->assertSee('Subscribers');
    }

    /** @test **/
    public function it_should_be_allowed_to_see_website_pages_on_dashboard(): void
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(PageResource::getUrl('index'));
        $response->assertStatus(200);
        $response->assertSee('Pages');
    }

    /** @test **/
    public function it_should_be_allowed_to_see_hero_section_on_dashboard(): void
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(HeroResource::getUrl('index'));
        $response->assertStatus(200);
        $response->assertSee('Hero Section');
    }

    /** @test **/
    public function it_should_be_allowed_to_see_website_sections_on_dashboard(): void
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(SectionResource::getUrl('index'));
        $response->assertStatus(200);
        $response->assertSee('Sections');
    }

    /** @test **/
    public function it_should_be_allowed_to_see_website_alerts_on_dashboard(): void
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(AlertResource::getUrl('index'));
        $response->assertStatus(200);
        $response->assertSee('Alerts');
    }

    /** @test **/
    public function it_should_be_allowed_to_see_slideshow_on_dashboard(): void
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(SlideshowResource::getUrl('index'));
        $response->assertStatus(200);
        $response->assertSee('Slideshow');
    }

    /** @test **/
    public function it_should_be_allowed_to_see_activity_log_on_dashboard(): void
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(ActivityResource::getUrl('index'));
        $response->assertStatus(200);
        $response->assertSee('Activity Log');
    }

    /** @test **/
    public function it_should_be_allowed_to_see_website_settings_on_dashboard(): void
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(SettingResource::getUrl('edit', ['record' => 1]));
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
