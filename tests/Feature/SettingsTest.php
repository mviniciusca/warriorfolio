<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SettingsTest extends TestCase
{

    /** @test **/
    public function it_should_allowed_to_see_settings_edit_page(): void
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(route('filament.admin.resources.settings.edit', ['record' => 1]));
        $response->assertStatus(200);
        $response->assertSee('Settings');
    }
}
