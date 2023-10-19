<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\EmployeeDetail;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = FakerFactory::create();


        for ($i = 1; $i <= 50; $i++) {
            $employee = Employee::create([
                "nip" => $faker->numberBetween(1, 100),
                "fullname" => $faker->name(),
                "nickname" => $faker->firstName(),
                "hire_date" => $faker->date(),
                "company_email" => $faker->unique()->email(),
            ]);

            // Employee Details database
            $detail = EmployeeDetail::create([
                'employee_id' => $employee->id,
                'position_id' => rand(1, 6),
                'status' => rand(0, 1),
            ]);
        }


        // // Employees database
        // $employee1 = Employee::create([
        //     "nip" => $faker->numberBetween(1, 100),
        //     "fullname" => $faker->name(),
        //     "nickname" => $faker->firstName(),
        //     "hire_date" => $faker->date(),
        //     "company_email" => $faker->unique()->email(),
        // ]);
        // $employee2 = Employee::create([
        //     "nip" => $faker->numberBetween(1, 100),
        //     "fullname" => $faker->name(),
        //     "nickname" => $faker->firstName(),
        //     "hire_date" => $faker->date(),
        //     "company_email" => $faker->unique()->email(),
        // ]);
        // $employee3 = Employee::create([
        //     "nip" => $faker->numberBetween(1, 100),
        //     "fullname" => $faker->name(),
        //     "nickname" => $faker->firstName(),
        //     "hire_date" => $faker->date(),
        //     "company_email" => $faker->unique()->email(),
        // ]);
        // $employee4 = Employee::create([
        //     "nip" => $faker->numberBetween(1, 100),
        //     "fullname" => $faker->name(),
        //     "nickname" => $faker->firstName(),
        //     "hire_date" => $faker->date(),
        //     "company_email" => $faker->unique()->email(),
        // ]);
        // $employee5 = Employee::create([
        //     "nip" => $faker->numberBetween(1, 100),
        //     "fullname" => $faker->name(),
        //     "nickname" => $faker->firstName(),
        //     "hire_date" => $faker->date(),
        //     "company_email" => $faker->unique()->email(),
        // ]);
        // $employee6 = Employee::create([
        //     "nip" => $faker->numberBetween(1, 100),
        //     "fullname" => $faker->name(),
        //     "nickname" => $faker->firstName(),
        //     "hire_date" => $faker->date(),
        //     "company_email" => $faker->unique()->email(),
        // ]);
        // $employee7 = Employee::create([
        //     "nip" => $faker->numberBetween(1, 100),
        //     "fullname" => $faker->name(),
        //     "nickname" => $faker->firstName(),
        //     "hire_date" => $faker->date(),
        //     "company_email" => $faker->unique()->email(),
        // ]);
        // $employee8 = Employee::create([
        //     "nip" => $faker->numberBetween(1, 100),
        //     "fullname" => $faker->name(),
        //     "nickname" => $faker->firstName(),
        //     "hire_date" => $faker->date(),
        //     "company_email" => $faker->unique()->email(),
        // ]);
        // $employee9 = Employee::create([
        //     "nip" => $faker->numberBetween(1, 100),
        //     "fullname" => $faker->name(),
        //     "nickname" => $faker->firstName(),
        //     "hire_date" => $faker->date(),
        //     "company_email" => $faker->unique()->email(),
        // ]);
        // $employee10 = Employee::create([
        //     "nip" => $faker->numberBetween(1, 100),
        //     "fullname" => $faker->name(),
        //     "nickname" => $faker->firstName(),
        //     "hire_date" => $faker->date(),
        //     "company_email" => $faker->unique()->email(),
        // ]);


        // // Employee Details database
        // $detail1 = EmployeeDetail::create([
        //     'employee_id' => $employee1->id,
        //     'position_id' => rand(1, 6),
        //     'status' => $faker->numberBetween(0, 1),
        // ]);
        // $detail2 = EmployeeDetail::create([
        //     'employee_id' => $employee2->id,
        //     'position_id' => rand(1, 6),
        //     'status' => $faker->numberBetween(0, 1),
        // ]);
        // $detail3 = EmployeeDetail::create([
        //     'employee_id' => $employee3->id,
        //     'position_id' => rand(1, 6),
        //     'status' => $faker->numberBetween(0, 1),
        // ]);
        // $detail4 = EmployeeDetail::create([
        //     'employee_id' => $employee4->id,
        //     'position_id' => rand(1, 6),
        //     'status' => $faker->numberBetween(0, 1),
        // ]);
        // $detail5 = EmployeeDetail::create([
        //     'employee_id' => $employee5->id,
        //     'position_id' => rand(1, 6),
        //     'status' => $faker->numberBetween(0, 1),
        // ]);
        // $detail6 = EmployeeDetail::create([
        //     'employee_id' => $employee6->id,
        //     'position_id' => rand(1, 6),
        //     'status' => $faker->numberBetween(0, 1),
        // ]);
        // $detail7 = EmployeeDetail::create([
        //     'employee_id' => $employee7->id,
        //     'position_id' => rand(1, 6),
        //     'status' => $faker->numberBetween(0, 1),
        // ]);
        // $detail8 = EmployeeDetail::create([
        //     'employee_id' => $employee8->id,
        //     'position_id' => rand(1, 6),
        //     'status' => $faker->numberBetween(0, 1),
        // ]);
        // $detail9 = EmployeeDetail::create([
        //     'employee_id' => $employee9->id,
        //     'position_id' => rand(1, 6),
        //     'status' => $faker->numberBetween(0, 1),
        // ]);
        // $detail10 = EmployeeDetail::create([
        //     'employee_id' => $employee10->id,
        //     'position_id' => rand(1, 6),
        //     'status' => $faker->numberBetween(0, 1),
        // ]);
    }
}
