<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
