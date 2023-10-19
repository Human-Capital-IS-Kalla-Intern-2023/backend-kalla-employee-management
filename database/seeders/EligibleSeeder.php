<?php

namespace Database\Seeders;

use App\Models\Eligible;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;

class EligibleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = FakerFactory::create();


        $json = [
            [
                "component_id" => 1,
                "order" => 1,
                "component_name" => "Gaji Pokok",
                "type" => "fixed pay",
                "is_hide" => 1,
                "is_edit" => 0,
                "is_active" => 1,
                "is_status" => 1
            ],
            [
                "component_id" => 1,
                "order" => 2,
                "component_name" => "Tunjangan Transportasi",
                "type" => "fixed pay",
                "is_hide" => 1,
                "is_edit" => 0,
                "is_active" => 1,
                "is_status" => 1,
            ],
            [
                "component_id" => 1,
                "order" => 3,
                "component_name" => "Tunjangan Komunikasi",
                "type" => "fixed pay",
                "is_hide" => 1,
                "is_edit" => 0,
                "is_active" => 1,
                "is_status" => 1
            ],
            [
                "component_id" => 1,
                "order" => 1,
                "component_name" => "Tunjangan BPJS",
                "type" => "deductions",
                "is_hide" => 1,
                "is_edit" => 0,
                "is_active" => 1,
                "is_status" => 1
            ],
            [
                "component_id" => 1,
                "order" => 2,
                "component_name" => "Gaji Makan",
                "type" => "fixed pay",
                "is_hide" => 1,
                "is_edit" => 0,
                "is_active" => 1,
                "is_status" => 1
            ]
        ];


        foreach (range(1, 20) as $eligible) {
            Eligible::create([
                "employee_detail_id" => 1,
                "type_bank" => "BRI",
                "account_number" => rand(1000, 10000),
                "account_name" => $faker->name(),
                "salary_detail" => json_encode($json),
            ]);
        }

        // $eligible = [
        //     [
        //         "employee_detail_id" => 1,
        //         "type_bank" => "BRI",
        //         "account_number" => rand(1000, 10000),
        //         "account_name" => $faker->name(),
        //         "salary_detail" => json_encode($json),
        //     ],
        //     [
        //         "employee_detail_id" => 2,
        //         "type_bank" => "BRI",
        //         "account_number" => rand(1000, 10000),
        //         "account_name" => $faker->name(),
        //         "salary_detail" => json_encode($json),
        //     ],
        //     [
        //         "employee_detail_id" => 3,
        //         "type_bank" => "BRI",
        //         "account_number" => rand(1000, 10000),
        //         "account_name" => $faker->name(),
        //         "salary_detail" => json_encode($json),
        //     ],
        //     [
        //         "employee_detail_id" => 4,
        //         "type_bank" => "BRI",
        //         "account_number" => rand(1000, 10000),
        //         "account_name" => $faker->name(),
        //         "salary_detail" => json_encode($json),
        //     ],
        //     [
        //         "employee_detail_id" => 5,
        //         "type_bank" => "BRI",
        //         "account_number" => rand(1000, 10000),
        //         "account_name" => $faker->name(),
        //         "salary_detail" => json_encode($json),
        //     ],
        //     [
        //         "employee_detail_id" => 6,
        //         "type_bank" => "BRI",
        //         "account_number" => rand(1000, 10000),
        //         "account_name" => $faker->name(),
        //         "salary_detail" => json_encode($json),
        //     ],
        //     [
        //         "employee_detail_id" => 7,
        //         "type_bank" => "BRI",
        //         "account_number" => rand(1000, 10000),
        //         "account_name" => $faker->name(),
        //         "salary_detail" => json_encode($json),
        //     ],
        //     [
        //         "employee_detail_id" => 8,
        //         "type_bank" => "BRI",
        //         "account_number" => rand(1000, 10000),
        //         "account_name" => $faker->name(),
        //         "salary_detail" => json_encode($json),
        //     ],
        //     [
        //         "employee_detail_id" => 9,
        //         "type_bank" => "BRI",
        //         "account_number" => rand(1000, 10000),
        //         "account_name" => $faker->name(),
        //         "salary_detail" => json_encode($json),
        //     ],
        //     [
        //         "employee_detail_id" => 10,
        //         "type_bank" => "BRI",
        //         "account_number" => rand(1000, 10000),
        //         "account_name" => $faker->name(),
        //         "salary_detail" => json_encode($json),
        //     ],
        // ];

        // Eligible::insert($eligible);
    }
}
