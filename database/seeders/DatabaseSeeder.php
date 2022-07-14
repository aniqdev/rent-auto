<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Review,Survey};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $this->call([
        //     RoleSeeder::class,
        //     UserSeeder::class,
        //     CaravanCategorySeeder::class,
        //     PageSeeder::class,
        //     PostSeeder::class,
        //     CouponSeeder::class,
        //     AccessorySeeder::class,
        //     StatusSeeder::class,
        //     SeasonSeeder::class,
        //     CaravanSeeder::class,
        //     TabSeeder::class,
        //     ReservationSeeder::class,
        //     CaravanTabSeeder::class,
        // ]);

        Review::factory(100)->create();

    }
}
