<?php

namespace Database\Seeders;

use App\Models\Mission;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Mission::insert([
            'missionName' => 'Welcome Noobs :D',
            'subMission1' => 'Buy Any Books!',
            'subMission2' => 'Read any book for 1 minutes (accumulative)',
            'subMission3' => 'Read any book for 2 minutes (accumulative)',
            'missionRewards' => 'Win A Book!',
            'winType' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Mission::insert([
            'missionName' => 'Richy Rich!',
            'subMission1' => 'Buy 5 books!',
            'subMission2' => 'Buy 8 books! ',
            'subMission3' => 'Read any book for 10 minutes (accumulative)',
            'missionRewards' => 'Get a 50.000 points!',
            'winType' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Mission::insert([
            'missionName' => 'AWIKWOK Star Campaign',
            'subMission1' => 'Read any book for 5 minutes (accumulative)',
            'subMission2' => 'Read any book for 15 minutes (accumulative)',
            'subMission3' => 'Buy 3 books!',
            'missionRewards' => 'Win A Book!',
            'winType' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
