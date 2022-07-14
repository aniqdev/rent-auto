<?php

namespace Database\Seeders;

use App\Models\Accessory;
use Illuminate\Database\Seeder;

class AccessorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accessory = Accessory::create([
            'user_id' => 1,
            'name' => 'Rozkládací židle Mako',
            'description' => 'Rozkládací židle s područkami.',
            'price_per_day' => '25.00',
            'access_charge' => '10.00',
            'max_count' => '4',
            'sort' => '1',
        ]);

        $accessory = Accessory::create([
            'user_id' => 1,
            'name' => 'Gril na dřevěné uhlí',
            'description' => 'Grilovací set - kvalitní gril Weber Premium, 3 kg pytel dřevěného uhlí, grilovací náčiní - obracečka, vidlička, kleště (+ 100 Kč jednorázový poplatek)',
            'price_per_day' => '40.00',
            'access_charge' => '100.00',
            'max_count' => '2',
            'sort' => '2',
        ]);

        $accessory = Accessory::create([
            'user_id' => 1,
            'name' => 'Plastový 25L kanystr na vodu',
            'description' => 'Plastový 25L kanystr s výpustnou hubicí. Vhodný na čerstvou vodu, pro zvýšení kapacity vestavěné nádrže. Uskladnění v zadní garáži vozidla. (Kanystr na pitnou vodu 15 L je v každém vozidle součástí základní výbavy.)',
            'price_per_day' => '5.00',
            'access_charge' => '0.00',
            'max_count' => '2',
            'sort' => '3',
        ]);

        $accessory = Accessory::create([
            'user_id' => 1,
            'name' => 'Plachta na kola',
            'description' => 'Venkovní krycí plachta na 4 kola s výstražným terčem.',
            'price_per_day' => '20.00',
            'access_charge' => '0.00',
            'max_count' => '1',
            'sort' => '4',
        ]);
    }
}
