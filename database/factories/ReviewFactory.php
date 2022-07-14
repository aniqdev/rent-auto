<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{Reservation,Caravan};

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $reservation = Reservation::inRandomOrder()->first();
        $caravan = Caravan::inRandomOrder()->first();


        return [
            'reservation_id' => $reservation->id,
            'caravan_id' => $caravan->id,
            'name' => $this->faker->name,
            'recense_service' => $this->faker->text,
            'recense_caravan' => $this->faker->text,
            'public' => rand(0, 1),
            'rating_service' => rand(1,5),
            'rating_caravan' => rand(1,5),
        ];
    }
}
