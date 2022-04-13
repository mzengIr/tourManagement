<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text($maxNbChars = 50),
            'description' => $this->faker->text($maxNbChars = 300),
            'price' => $this->faker->numerify('#####'),
            'days' => $this->faker->numerify('##'),
            'type' => $this->faker->randomElement(['air', 'land','cycle']),
            'admin_id' => 19 ,
            'num_reserved_people' => 0
        ];
    }
}
