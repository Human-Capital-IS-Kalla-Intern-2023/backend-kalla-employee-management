<?php

namespace Database\Seeders;

use App\Models\Salary;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;

class SalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = FakerFactory::create();

        $salaries = [
            [
                'salary_name' => 'Gaji Tetap',
                'company_id' => 1,
                'is_active' => 1, 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Gaji Per Jam',
                'company_id' => 2,
                'is_active' => 1, 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Gaji Komisi',
                'company_id' => 2,
                'is_active' => 1, 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Gaji Variabel',
                'company_id' => 3,
                'is_active' => 1, 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Gaji Kinerja',
                'company_id' => 3,
                'is_active' => 1, 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Gaji Tanggal Merah',
                'company_id' => 3,
                'is_active' => 1, 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Gaji Mingguan',
                'company_id' => 4,
                'is_active' => 1, 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Gaji Tetap Plus Bonus',
                'company_id' => 7,
                'is_active' => 1, 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Gaji Ganda',
                'company_id' => 7,
                'is_active' => 1, 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Gaji Partisipasi Saham',
                'company_id' => 9,
                'is_active' => 1, 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Gaji Hari Raya',
                'company_id' => 8,
                'is_active' => 1, 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],

        ];

        Salary::insert($salaries);


        // foreach (range(1, 20) as $salary) {
        //     Salary::create([
        //         'salary_name' => 'Gaji pokok',
        //         'company_id' => rand(1, 20),
        //         'is_active' => 1,
        //         'created_at' => date('Y-m-d H:i:s', time()),
        //         'updated_at' => date('Y-m-d H:i:s', time()),
        //     ]);
        // }
    }
}
