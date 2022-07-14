<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = Status::create([
            'name' => 'Čeká na schválení',
            'color' => '#e4e6ef',
            'sort' => 1,
        ]);

        $status = Status::create([
            'name' => 'Čeká na platbu zálohy',
            'color' => '#ffa800',
            'sort' => 2,
        ]);

        $status = Status::create([
            'name' => 'Záloha zaplacena',
            'color' => '#c9f7f5',
            'sort' => 3,
        ]);

        $status = Status::create([
            'name' => 'Čeká na zaplacení nájmu',
            'color' => '#fff4de',
            'sort' => 4,
        ]);

        $status = Status::create([
            'name' => 'Čeká na zaplacení nájmu a zálohy',
            'color' => '#fff4de',
            'sort' => 5,
        ]);

        $status = Status::create([
            'name' => 'Nájem zaplacen',
            'color' => '#1bc5bd',
            'sort' => 6,
        ]);

        $status = Status::create([
            'name' => 'V pronájmu',
            'color' => '#e4e6ef',
            'sort' => 7,
        ]);

        $status = Status::create([
            'name' => 'Vráceno',
            'color' => '#3699ff',
            'sort' => 8,
        ]);

        $status = Status::create([
            'name' => 'Storno',
            'color' => '#f64e60',
            'sort' => 9,
        ]);
    }
}
