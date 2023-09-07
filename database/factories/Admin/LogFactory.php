<?php

namespace Database\Factories\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Admin\Client;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class LogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();
        if (!$user) {
            $user = User::factory()->count(1)
                ->create();
        }
        $client = Client::inRandomOrder()->first();
        if (!$client) {
            $client = Client::factory()->count(1)
                ->create();
        }
        $user2 = User::inRandomOrder()->first();
        if (!$user2) {
            $user2 = User::factory()->count(1)
                ->create();
        }
        return [
            'users_id' => $user->id,
            'clients_id' => $client->id,
            'updated_by' => $user2->id,
            'name' => fake()->company(),
            "deleted_at" => null
        ];
    }
}
