<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_redirect_admin_path(): void
    {
        $response = $this->get('/admin');

        $response->assertStatus(301);
    }
}
