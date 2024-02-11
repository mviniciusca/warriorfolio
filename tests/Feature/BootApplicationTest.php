<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BootApplicationTest extends TestCase
{
    /** @test **/
    public function it_should_get_homepage_page(): void
    {
        $this->get('/')->assertStatus(200);
    }

    /** @test **/
    public function it_should_exists_login_route(): void
    {
        $this->get(route('login'))->assertRedirect();
    }

}
