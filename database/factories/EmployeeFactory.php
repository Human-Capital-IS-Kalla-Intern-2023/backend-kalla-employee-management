<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Validation\Rules\Unique;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nip' => rand(1, 100),
            'fullname' => $this->faker->name(),
            'nickname' => $this->faker->firstName(),
            'hire_date' => $this->faker->date(),
            'company_email' => $this->faker->companyEmail(),
            'position' => rand(1, 3),

        ];
    }
    
    
}
