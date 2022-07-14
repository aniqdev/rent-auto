<?php

namespace Database\Seeders;

use App\Models\CaravanTab;
use Illuminate\Database\Seeder;

class CaravanTabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tab = CaravanTab::create([
            'slug' => 'technicke-udaje',
            'name' => 'Technické údaje',
            'sort' => '1',
        ]);

        $tab = CaravanTab::create([
            'slug' => 'kabina-vozu',
            'name' => 'Kabina vozu',
            'sort' => '2',
        ]);

        $tab = CaravanTab::create([
            'slug' => 'obytna-cast',
            'name' => 'Obytná část',
            'sort' => '3',
        ]);

        $tab = CaravanTab::create([
            'slug' => 'doplnkova-vybava',
            'name' => 'Doplňková výbava',
            'sort' => '4',
        ]);

        $tab = CaravanTab::create([
            'slug' => 'sluzby',
            'name' => 'Služby',
            'sort' => '5',
        ]);

        $tab = CaravanTab::create([
            'slug' => 'podminky-pronajmu',
            'name' => 'Podmínky pronájmu',
            'sort' => '6',
        ]);
    }
}
