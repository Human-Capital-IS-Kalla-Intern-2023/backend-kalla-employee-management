<?php

namespace Database\Factories;

use App\Models\Employee;
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
            'company_email' => $this->faker->unique->companyEmail(),
            // 'id_main_position' => implode(',', rand(1, 10)),
            // 'id_secondary_position' => [rand(1, 10), rand(1, 10)],

        ];
    }
}
