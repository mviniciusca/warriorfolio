<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MailTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function it_should_list_all_mails(): void
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(route('filament.admin.resources.mails.index'));
        $response->assertStatus(200);
        $response->assertSee('Inbox');
    }

    /** @test **/
    public function it_should_show_view_mail_page(): void
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(route('filament.admin.resources.mails.view', ['record' => 1]));
        $response->assertStatus(200);
        $response->assertSee('Mail');
    }

    /** @test **/
    public function it_should_be_allow_to_see_mail_bin_page(): void
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(route('filament.admin.resources.mails.bin'));
        $response->assertStatus(200);
        $response->assertSee('Trashed Mails');
    }
}
