<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'all access']);
        $permissions = json_decode(
            file_get_contents(__DIR__.'/permissions.json'),
            false
        );
        foreach($permissions->data as $key => $permission)
        {
            $p = Permission::create(['name' => $permission]);
            $role->givePermissionTo($p);
        }
        

        $email = 'admin@example.com';
        $user = User::where(
            'email', $email
        )->first();
        if (
            null !== $user
        ) {
            echo 'Not creating a user because user with admin@example.com already exists'.
                PHP_EOL;
            $user->assignRole('all access');
            return;
        }
        echo 'Creating user with email admin@example.com'.PHP_EOL;
        $user = User::factory()->count(1)
            ->create(compact('email'));
        $user[0]->assignRole('all access');
    }
}
