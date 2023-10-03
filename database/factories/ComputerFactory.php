<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\computer>
 */
class ComputerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(mt_rand(2,8)),
            'no_computer' => $this->faker->randomNumber(),
            'room_id' => mt_rand(1,3),
            'brand_id' => mt_rand(1,3),
            'status' => $this->faker->boolean(),
            'date' => $this->faker->date(),
            'broken_time' => $this->faker->date()
        ];
    }
}
