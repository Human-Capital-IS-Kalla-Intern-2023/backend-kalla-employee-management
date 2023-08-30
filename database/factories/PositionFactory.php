<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Position>
 */
class PositionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'companies_id'=>rand(1, 100),
            'position_name'=> $this->faker->company(),
            'directorate' => $this->faker->company(),
            'division' => $this->faker->company(),
            'section' => $this->faker->company()
        ];
    }
}