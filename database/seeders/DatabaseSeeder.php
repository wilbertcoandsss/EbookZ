<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(GenreSeeder::class);
        $this->call(PublisherSeeder::class);
        $this->call(BookSeeder::class);
        $this->call(MissionSeeder::class);

        User::insert([
            'name' => 'Wilbert Coandadiputra',
            'email' => 'wilbert@gmail.com',
            'password' => bcrypt("wilbert123"),
            'gender' => 'Male',
            'dob' => '2003-07-24'
        ]);

        User::insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt("admin123"),
            'gender' => 'Female',
            'dob' => '2003-07-24',
            'role' => 'admin'
        ]);
    }
}
