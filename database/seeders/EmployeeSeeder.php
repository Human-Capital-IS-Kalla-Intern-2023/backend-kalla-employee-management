<?php

namespace Database\Seeders;

use App\Models\Employee;
use Carbon\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = [
            [

            ],
        ];

        Employee::insert($employees);
    }
}
