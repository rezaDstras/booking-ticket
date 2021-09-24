<?php

namespace Database\Factories;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ticket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'movie_id' => $this->faker->numberBetween(1,5),
            'user_id' => $this->faker->randomDigitNotZero(),
            'seat_id' => $this->faker->numberBetween(31,40),
        ];
    }
}
