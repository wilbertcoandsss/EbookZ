<?php

namespace Database\Seeders;

use App\Models\Genre;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Genre::insert([
            'genreName' => "Fantasy",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Genre::insert([
            'genreName' => "Epic",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Genre::insert([
            'genreName' => "Philosophy",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Genre::insert([
            'genreName' => "Dystopian",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Genre::insert([
            'genreName' => "Science Fiction",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Genre::insert([
            'genreName' => "Philosophy",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Genre::insert([
            'genreName' => "Fiction",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
