<?php

namespace Database\Seeders;

use App\Models\CaravanAttribute;
use App\Models\CaravanAttributeCategory;
use Illuminate\Database\Seeder;

class CaravanAttributeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* $category = CaravanAttributeCategory::create([
            'name' => 'Technické údaje',
            'sort' => 1,
        ]);

        $attribute = $category->attributes()->create([
            'name' => 'platform',
        ]);


        $category = CaravanAttributeCategory::create([
            'name' => 'Kabina vozu',
            'sort' => 2,
        ]);

        $category = CaravanAttributeCategory::create([
            'name' => 'Obytná část',
            'sort' => 3,
        ]);

        $category = CaravanAttributeCategory::create([
            'name' => 'Doplňková výbava',
            'sort' => 4,
        ]); */
    }
}
