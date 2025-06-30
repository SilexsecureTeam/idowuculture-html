<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $user = new User();
        $user->firstname = fake()->firstName; 
        $user->lastname = fake()->lastName; 
        $user->email = 'admin@gmail.com'; 
        $user->phone = fake()->phoneNumber; 
        $user->password = Hash::make('password') ;
        $user->role = UserRole::ADMIN;
        
        $user->save();
    }
}
