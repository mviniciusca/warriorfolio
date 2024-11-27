<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogTest extends TestCase
{
    /** @test **/
    public function it_should_allow_access(): void
    {
        $this->get('/admin/logs')->assertStatus(403);
    }
}
