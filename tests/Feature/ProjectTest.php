<?php

namespace Tests\Feature;

use App\Filament\Resources\ProjectResource;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    /** @test **/
    public function it_should_list_all_projects(): void
    {

        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(ProjectResource::getUrl('index'));
        $response->assertStatus(200);
        $response->assertSee('Projects');
    }

    /** @test **/
    public function it_should_show_create_project_page(): void
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(ProjectResource::getUrl('create'));
        $response->assertStatus(200);
        $response->assertSee('Create Project');
    }

    /** @test **/
    public function it_should_show_edit_project_page(): void
    {
        $user = \App\Models\User::factory()->create();
        $project = \App\Models\Project::factory()->create();
        $response = $this->actingAs($user)->get(ProjectResource::getUrl('edit', ['record' => $project->id]));
        $response->assertStatus(200);
        $response->assertSee('Edit');
    }
}
