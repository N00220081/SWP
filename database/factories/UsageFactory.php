<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usage>
 */
class UsageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'member_id' => function () {
                return \App\Models\Member::inRandomOrder()->first()->id;
            },
            'date' => $this->faker->date(), 
            'length' => $this->faker->numberBetween(0, 180) . ':' . $this->faker->numberBetween(0, 59),
            'amount' => $this->faker->randomFloat(2, 1, 100), 
        ];
    }
}