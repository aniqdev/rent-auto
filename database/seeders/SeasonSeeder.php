<?php

namespace Database\Seeders;

use App\Models\Season;
use Illuminate\Database\Seeder;

class SeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $season = Season::create([
            'name' => 'Sezóna A',
            'start_date' => '2021-06-25',
            'end_date' => '2021-08-13',
            'type' => 7,
        ]);

        $season = Season::create([
            'name' => 'Sezóna B',
            'start_date' => '2021-05-28',
            'end_date' => '2021-06-24',
            'type' => 1,
        ]);

        $season = Season::create([
            'name' => 'Sezóna B',
            'start_date' => '2021-08-14',
            'end_date' => '2021-09-29',
            'type' => 1,
        ]);

        $season = Season::create([
            'name' => 'Sezóna B',
            'start_date' => '2021-10-27',
            'end_date' => '2021-11-01',
            'type' => 1,
        ]);

        $season = Season::create([
            'name' => 'Sezóna B',
            'start_date' => '2021-12-22',
            'end_date' => '2021-12-31',
            'type' => 1,
        ]);

        $season = Season::create([
            'name' => 'Sezóna C',
            'start_date' => '2021-04-07',
            'end_date' => '2021-05-27',
            'type' => 1,
        ]);

        $season = Season::create([
            'name' => 'Sezóna C',
            'start_date' => '2021-09-30',
            'end_date' => '2021-10-26',
            'type' => 1,
        ]);

        $season = Season::create([
            'name' => 'Sezóna C',
            'start_date' => '2021-11-2',
            'end_date' => '2021-12-21',
            'type' => 1,
        ]);
    }
}
