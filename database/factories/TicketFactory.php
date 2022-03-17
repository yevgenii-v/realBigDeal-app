<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'       => rand(4, 100),
            'topic'         => $this->faker->paragraph,
            'description'   => $this->faker->text,
        ];
    }
}
