<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            // Create a default role if it doesn't exist
            $defaultRole = Role::firstOrCreate(['name' => 'normal_client']);

            // Seed a user with the default role
            User::create([
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => bcrypt('password'), // Hash your password
                'role' => $defaultRole->id,
                // Add other user attributes as needed
            ]);
    }
}
