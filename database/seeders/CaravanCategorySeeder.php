<?php

namespace Database\Seeders;

use App\Models\CaravanCategory;
use Illuminate\Database\Seeder;

class CaravanCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = CaravanCategory::create([
            'slug' => 'kompaktni',
            'name' => 'Kompaktní vozy',
            'count_name' => 'kompaktních obytných vozů',
            'license' => 'B',
            'persons_range' => '4-5',
            'bike_count' => '4',
            'shower' => false,
            'toilet' => false,
            'short_description' => '<strong>Kompaktní</strong> vozy jsou nejmenší obytné vozy v naší flotile.',
            'description' => '<strong>Kompaktní</strong> vozy jsou nejmenší obytné vozy v naší flotile.',
            'video' => '',
            'sort' => 1
        ]);

        $category = CaravanCategory::create([
            'slug' => 'dodavky-s-vestavbou',
            'name' => 'Dodávky s vestavbou',
            'count_name' => 'obytných dodávek s vestavbou',
            'license' => 'B',
            'persons_range' => '2-4',
            'bike_count' => '2',
            'shower' => true,
            'toilet' => true,
            'short_description' => '<strong>Dodávky s vestavbou</strong> jsou ideální vozy pro ty z vás, kterým kompaktní vozy připadají již moc malé a polointegrované vozy moc velké.',
            'description' => '<strong>Dodávky s vestavbou</strong> jsou ideální vozy pro ty z vás, kterým kompaktní vozy připadají již moc malé a polointegrované vozy moc velké.',
            'video' => '',
            'sort' => 2
        ]);

        $category = CaravanCategory::create([
            'slug' => 'polointegrovane',
            'name' => 'Polointegrované vozy',
            'count_name' => 'polointegrovaných obytných vozů',
            'license' => 'B',
            'persons_range' => '3-5',
            'bike_count' => '3-6',
            'shower' => true,
            'toilet' => true,
            'short_description' => 'Nejpočetnější skupina obytných vozů nejen v naší flotile, ale i na celém karavanistickém trhu, polointegrované vozy, jsou u nás zastoupeny vozy sedmi kategorií v délkách od necelých šesti až po 7,5 metru.',
            'description' => 'Nejpočetnější skupina obytných vozů nejen v naší flotile, ale i na celém karavanistickém trhu, polointegrované vozy, jsou u nás zastoupeny vozy sedmi kategorií v délkách od necelých šesti až po 7,5 metru.',
            'video' => '',
            'sort' => 3
        ]);

        $category = CaravanCategory::create([
            'slug' => 'alkovna',
            'name' => 'Vozy s alkovnou',
            'count_name' => 'obytných vozů s alkovnou',
            'license' => 'B',
            'persons_range' => '4-6',
            'bike_count' => '4-6',
            'shower' => true,
            'toilet' => true,
            'short_description' => '<strong>Vozy s alkovnou</strong> jsou pro mnohé z vás "tím pravým obytňákem". Ano, takto vypadaly před třiceti čtyřiceti lety všechny rodinné obytné vozy.',
            'description' => '<strong>Vozy s alkovnou</strong> jsou pro mnohé z vás "tím pravým obytňákem". Ano, takto vypadaly před třiceti čtyřiceti lety všechny rodinné obytné vozy.',
            'video' => '',
            'sort' => 4
        ]);
    }
}
