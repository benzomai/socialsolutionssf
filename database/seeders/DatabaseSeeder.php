<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $users = [
            [
                'name'=>'Client',
                'email'=>'client@boombox.social',
                'password'=>bcrypt('12345678'),
                'user_type'=>2
            ],
            [
                'name'=>'SMM',
                'email'=>'smm@boombox.social',
                'password'=>bcrypt('12345678'),
                'user_type'=>1
            ],
            [
                'name'=>'Admin',
                'email'=>'admin@boombox.social',
                'password'=>bcrypt('12345678'),
                'user_type'=>0
            ]
            
        ];

        foreach($users as $user) {
            User::create($user);
        }
    }
}
