<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reservation = Reservation::create([
            'status_id' => 1,
            'user_id' => null,
            'coupon_id' => null,
            'caravan_id' => 1,
            'start_date' => '2021-07-01',
            'end_date' => '2021-07-30',
            'name' => 'Matúš',
            'last_name' => 'Vojáček',
            'birthdate' => '1996-12-09',
            'phone' => '727806465',
            'email' => 'matus.vojacek@gmail.com',
            'address' => 'U Špejcharu 419',
            'city' => 'Praha',
            'zip' => '14700',
            'company' => null,
            'ico' => null,
            'dic' => null,
            'comment' => null,
            'base_deposit' => 30000,
            'base_price' => 100000,
            'accessories_price' => 15499,
            'total_price' => 115499,
            'payment_method' => 'cash',
            'ordered_by' => 1,
        ]);
    }
}
