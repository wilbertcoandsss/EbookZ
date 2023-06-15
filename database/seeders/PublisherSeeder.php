<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Publisher::insert([
            'publisherName' => "Crown Publishing Group",
            'publisherEmail' => "crown.group@publishing.pub",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Publisher::insert([
            'publisherName' => "Gramedia Pustaka Utama",
            'publisherEmail' => "gramedia.utama@publishing.pub",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Publisher::insert([
            'publisherName' => "Penguin Random House",
            'publisherEmail' => "penguin.house@publishing.pub",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Publisher::insert([
            'publisherName' => "Harper Collins",
            'publisherEmail' => "harper.collins@publishing.pub",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Publisher::insert([
            'publisherName' => "Macmillan",
            'publisherEmail' => "macmillan@publishing.pub",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);


    }
}
