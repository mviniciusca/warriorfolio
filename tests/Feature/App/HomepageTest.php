<?php

namespace Tests\Feature\App;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomepageTest extends TestCase
{

    /** @test **/
    public function it_should_get_homepage(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
