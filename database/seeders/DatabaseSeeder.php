<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Carbon\Carbon;
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
            'dob' => '2003-07-24',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        User::insert([
            'name' => 'Crown Publishing Group',
            'email' => 'crown-group@publishing.pub',
            'password' => bcrypt("crowngroup"),
            'gender' => 'Male',
            'dob' => '2003-07-24',
            'role' => 'Publisher',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        User::insert([
            'name' => 'Gramedia Pustaka Utama',
            'email' => 'gramedia.utama@publishing.pub',
            'password' => bcrypt("gramediautama"),
            'gender' => 'Female',
            'dob' => '2003-07-24',
            'role' => 'Publisher',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        User::insert([
            'name' => 'Penguin Random House',
            'email' => 'penguin.house@publishing.pub',
            'password' => bcrypt("penguinhouse"),
            'gender' => 'Male',
            'dob' => '2003-07-24',
            'role' => 'Publisher',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        User::insert([
            'name' => 'Harper Collins',
            'email' => 'harper.collins@publishing.pub',
            'password' => bcrypt("harpercollins"),
            'gender' => 'Male',
            'dob' => '2003-07-24',
            'role' => 'Publisher',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        User::insert([
            'name' => 'Macmillan',
            'email' => 'macmillan@publishing.pub',
            'password' => bcrypt("macmillan"),
            'gender' => 'Female',
            'dob' => '2003-07-24',
            'role' => 'Publisher',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
