<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Slider::insert([
            'title' => 'Business',
            'pic' => 'Business.jpg',
            'desc' => 'Business Book'
        ]);
    }
}
