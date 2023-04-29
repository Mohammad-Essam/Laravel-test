<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();


        \App\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@controway.com',
            'password' =>bcrypt('00000000A_'),
            'role' => 'admin',
            'is_approved' => true,

        ]);

        \App\Models\User::create([
            'name' => 'test1',
            'email' => 'test1@test1.com',
            'password' =>bcrypt('00000000A_'),
            'role' => 'user',
            'is_approved' => false,

        ]);

        \App\Models\User::create([
            'name' => 'test2',
            'email' => 'admin@test2.com',
            'password' =>bcrypt('00000000A_'),
            'role' => 'user',
            'is_approved' => false,

        ]);

        \App\Models\User::create([
            'name' => 'test3',
            'email' => 'admin@test3.com',
            'password' =>bcrypt('00000000A_'),
            'role' => 'user',
            'is_approved' => false,

        ]);
    }
}
