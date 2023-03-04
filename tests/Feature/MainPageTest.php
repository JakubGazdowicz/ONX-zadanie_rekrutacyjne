<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MainPageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_main_page_view(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
