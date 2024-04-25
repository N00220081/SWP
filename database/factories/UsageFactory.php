<?php

namespace Database\Factories;

use App\Models\Member;
use App\Models\Usage;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Usage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Get a random member ID from existing members
        $memberId = Member::inRandomOrder()->first()->id;

        // Generate random values for minutes (0-59) and seconds (0-59)
        $minutes = $this->faker->numberBetween(0, 59);
        $seconds = $this->faker->numberBetween(0, 59);

        return [
            'member_id' => $memberId,
            'date' => $this->faker->dateTimeBetween('2023-01-01', now()->format('Y-m-d')),
            'length' => sprintf('00:%02d:%02d', $minutes, $seconds), // Format minutes and seconds with leading zeros
            'amount' => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}
