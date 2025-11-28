<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    /** @test **/
    public function it_should_list_all_projects(): void
    {

        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(route('filament.admin.resources.projects.index'));
        $response->assertStatus(200);
        $response->assertSee('Projects');
    }

    /** @test **/
    public function it_should_show_create_project_page(): void
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(route('filament.admin.resources.projects.create'));
        $response->assertStatus(200);
        $response->assertSee('Create Project');
    }

    /** @test **/
    public function it_should_show_edit_project_page(): void
    {
        $user = \App\Models\User::factory()->create();
        $project = \App\Models\Project::factory()->create();
        $response = $this->actingAs($user)->get(route('filament.admin.resources.projects.edit', ['record' => $project->id]));
        $response->assertStatus(200);
        $response->assertSee('Edit');
    }
}
