<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    public function setUp(): void {
        parent::setUp();

        $this->user = $this->app->make("App\Models\User");
    }

    public function test_index(): void
    {
        $this->seed();
        $user = $this->user->where("email", "admin@example.com")
            ->first();
        $response = $this->actingAs($user)
            ->get('/admin/dashboard');

        $response->assertStatus(200)
            ->assertSee("Dashboard")
            ->assertSee("Home");
    }
}
