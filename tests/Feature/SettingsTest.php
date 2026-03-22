<?php

namespace Tests\Feature;

use App\Filament\Resources\SettingResource;
use Tests\TestCase;

class SettingsTest extends TestCase
{
    /** @test **/
    public function it_should_allowed_to_see_settings_edit_page(): void
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(SettingResource::getUrl('edit', ['record' => 1]));
        $response->assertStatus(200);
        $response->assertSee('Settings');
    }
}
