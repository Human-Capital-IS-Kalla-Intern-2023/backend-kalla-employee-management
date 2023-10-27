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
            "nip" => $faker->numberBetween(1, 100),
            "fullname" => $faker->name(),
            "nickname" => $faker->firstName(),
            "hire_date" => $faker->date(),
            "company_email" => $faker->unique()->companyEmail(),
        ];

        $position = [
            [
                [
                    'position_name' => 'Human Resources Coordinator',
                    'company_id' => rand(1, 10),
                    'directorat_id' => rand(1, 10),
                    'division_id' => rand(1, 5),
                    'section_id' => rand(1, 5),
                    'job_grade_id' => rand(1, 5),
                    'created_at' => date('Y-m-d H:i:s', time()),
                    'updated_at' => date('Y-m-d H:i:s', time()),
                ],
                [
                    'position_name' => 'IT Support Specialist',
                    'company_id' => rand(1, 10),
                    'directorat_id' => rand(1, 10),
                    'division_id' => rand(1, 10),
                    'section_id' => rand(1, 10),
                    'job_grade_id' => rand(1, 5),
                    'created_at' => date('Y-m-d H:i:s', time()),
                    'updated_at' => date('Y-m-d H:i:s', time()),
                ],
                [
                    'position_name' => 'Research Analyst',
                    'company_id' => rand(1, 10),
                    'directorat_id' => rand(1, 10),
                    'division_id' => rand(1, 10),
                    'section_id' => rand(1, 10),
                    'job_grade_id' => rand(1, 5),
                    'created_at' => date('Y-m-d H:i:s', time()),
                    'updated_at' => date('Y-m-d H:i:s', time()),
                ],
                [
                    'position_name' => 'Staff IT',
                    'company_id' => rand(1, 10),
                    'directorat_id' => rand(1, 10),
                    'division_id' => rand(1, 10),
                    'section_id' => rand(1, 10),
                    'job_grade' => rand(1, 5),
                    'created_at' => date('Y-m-d H:i:s', time()),
                    'updated_at' => date('Y-m-d H:i:s', time()),
                ],
                [
                    'position_name' => 'Teknisi',
                    'company_id' => rand(1, 10),
                    'directorat_id' => rand(1, 10),
                    'division_id' => rand(1, 10),
                    'section_id' => rand(1, 10),
                    'job_grade_id' => rand(1, 5),
                    'created_at' => date('Y-m-d H:i:s', time()),
                    'updated_at' => date('Y-m-d H:i:s', time()),
                ],
                [
                    'position_name' => 'Manager',
                    'company_id' => rand(1, 10),
                    'directorat_id' => rand(1, 10),
                    'division_id' => rand(1, 10),
                    'section_id' => rand(1, 10),
                    'job_grade_id' => rand(1, 5),
                    'created_at' => date('Y-m-d H:i:s', time()),
                    'updated_at' => date('Y-m-d H:i:s', time()),
                ],
            ],
        ];

        $eligible = [
            [
                "employee_detail_id" => $faker->numberBetween(1, 10),
                "type_bank" => "BRI",
                "account_number" => rand(1000, 10000),
                "account_name" => $faker->name(),
                "salary_detail" => [
                    [
                        "component_id" => 1,
                        "order" => 1,
                        "component_name" => "Gaji Pokok",
                        "type" => "fixed pay",
                        "is_hide" => 0,
                        "is_edit" => 1,
                        "is_active" => 1,
                        "is_status" => 1
                    ],
                    [
                        "component_id" => 1,
                        "order" => 2,
                        "component_name" => "Tunjangan Transportasi",
                        "type" => "fixed pay",
                        "is_hide" => 0,
                        "is_edit" => 1,
                        "is_active" => 1,
                        "is_status" => 1,
                    ],
                    [
                        "component_id" => 1,
                        "order" => 3,
                        "component_name" => "Tunjangan Komunikasi",
                        "type" => "fixed pay",
                        "is_hide" => 0,
                        "is_edit" => 1,
                        "is_active" => 1,
                        "is_status" => 1
                    ],
                    [
                        "component_id" => 1,
                        "order" => 1,
                        "component_name" => "Tunjangan BPJS",
                        "type" => "deductions",
                        "is_hide" => 0,
                        "is_edit" => 1,
                        "is_active" => 1,
                        "is_status" => 1
                    ],
                    [
                        "component_id" => 1,
                        "order" => 2,
                        "component_name" => "Gaji Makan",
                        "type" => "fixed pay",
                        "is_hide" => 0,
                        "is_edit" => 1,
                        "is_active" => 1,
                        "is_status" => 1
                    ]
                ],
            ],
        ];


        for ($i = 0; $i < 20; $i++) {
            $employeeCompensation = EmployeeCompensation::create([
                'compensations_id' => rand(1, 10),
                'employee' => json_encode($employee),
                'position' => json_encode($position),
                'eligble' => json_encode($eligible),
            ]);
        }
    }
}
