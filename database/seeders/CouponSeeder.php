<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coupon = Coupon::create([
            'user_id' => 1,
            'name' => 'WELCOMECOUPON',
            'type' => 'value',
            'discount' => '100',
            'active' => 1
        ]);

        $coupon = Coupon::create([
            'user_id' => 1,
            'name' => 'WELCOMECOUPON50',
            'type' => 'percent',
            'discount' => '50',
            'active' => 0
        ]);

        $coupon = Coupon::create([
            'user_id' => 1,
            'name' => 'SEZONA2021',
            'type' => 'percent',
            'discount' => '25',
            'active' => 1
        ]);
    }
}
