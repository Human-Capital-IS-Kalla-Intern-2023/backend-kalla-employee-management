<?php

namespace Database\Seeders;

use App\Models\SalaryDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;

class SalaryDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = FakerFactory::create();

        $components = [
            [
                'salary_id' => rand(1, 10),
                'order' => $faker->numberBetween(1, 10),
                'component_name' => 'Gaji Pokok',
                'type' => 'fixed pay',
                'is_edit' => 0,
                'is_hide' => 1,
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_id' => rand(1, 10),
                'order' => 2,
                'component_name' => 'Tunjangan Komunikasi',
                'type' => 'fixed pay',
                'is_edit' => 0,
                'is_hide' => 1,
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_id' => rand(1, 10),
                'order' => 3,
                'component_name' => 'Tunjangan Transportasi',
                'type' => 'fixed pay',
                'is_edit' => 0,
                'is_hide' => 1,
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_id' => rand(1, 10),
                'order' => 1,
                'component_name' => 'Tunjangan BPJS',
                'type' => 'deductions',
                'is_edit' => 0,
                'is_hide' => 1,
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_id' => rand(1, 10),
                'order' => 1,
                'component_name' => 'Tunjangan BPJS',
                'type' => 'deductions',
                'is_edit' => 0,
                'is_hide' => 1,
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_id' => rand(1, 10),
                'order' => 1,
                'component_name' => 'Gaji Pokok',
                'type' => 'fixed pay',
                'is_edit' => 0,
                'is_hide' => 1,
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_id' => rand(1, 10),
                'order' => 2,
                'component_name' => 'Tunjangan Komunikasi',
                'type' => 'fixed pay',
                'is_edit' => 0,
                'is_hide' => 1,
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
        ];

        SalaryDetail::insert($components);



        foreach (range(1, 20) as $salaryDetail) {
            $type = $faker->boolean();

            if ($type) {
                $value = 'fixed pay';
            } else {
                $value = 'deductions';
            }

            SalaryDetail::create([
                'salary_id' => rand(1, 10),
                'order' => 2,
                'component_name' => $faker->sentence(),
                'type' => $value,
                'is_edit' => 0,
                'is_hide' => 1,
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ]);
        }
    }
}
