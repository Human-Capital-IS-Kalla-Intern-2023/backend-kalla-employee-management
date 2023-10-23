<?php

namespace Database\Seeders;

use App\Models\EmployeeCompensation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;

class EmployeeCompensationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = FakerFactory::create();

        $employee = [
            [],
        ];

        $position = [
            [],
        ];

        $eligible = [
            [],
        ];


        for ($i = 0; $i < 20; $i++) {
            $employeeCompensation = EmployeeCompensation::create([
                'compensation_id' => rand(1, 10),
                'employee' => $employee,
                'position' => $position,
                'eligible' => $eligible,
            ]);
        }
    }
}
