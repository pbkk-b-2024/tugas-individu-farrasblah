<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Mas Author',
                'email' => 'author@gmail.com',
                'role' => 'author',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Mas Guest',
                'email' => 'guest@gmail.com',
                'role' => 'guest',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Mas Registered user',
                'email' => 'registered-user@gmail.com',
                'role' => 'registered-user',
                'password' => bcrypt('123456')
            ],
        ];

        foreach($userData as $key => $val){
            User::create($val);
        };
    }
}
