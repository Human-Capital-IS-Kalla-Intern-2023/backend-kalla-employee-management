<?php

namespace Database\Seeders;

use App\Models\Compensation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;

class CompensationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = FakerFactory::create();

        // for ($i = 0; $i < 20; $i++) {
        //     $month = $faker->numberBetween(1, 12); // Angka acak antara 1 dan 12 untuk bulan
        //     $year = $faker->numberBetween(2000, 2023); // Tahun antara 2000 dan 2023

        //     // Buat array yang berisi bulan dan tahun
        //     // $period = ['month' => $month, 'year' => $year];

        //     // Buat instance Compensation dengan data acak
        //     $compensation = new Compensation();
        //     $compensation->company_id = rand(1, 10);
        //     $compensation->salary_id = rand(1, 10);
        //     $compensation->compensation_name = $faker->date('m_Y');
        //     // $compensation->year = $year;
        //     // $compensation->month = $month;
        //     $compensation->period = "$year-$month-01";

        //     $compensation->save();
        // }

        $compensation = [
            ["company_id" => "1", "salary" => json_encode(["id" => 1, "is_active" => 1, "company_id" => 1, "salary_name" => "Gaji Tetap"]), "compensation_name" => "November 2023", "period" => "2023-11-01", "created_at" => date('Y-m-d H:i:s', time()), "updated_at" => date('Y-m-d H:i:s', time())],
            ["company_id" => "2", "salary" => json_encode(["id" => 2, "is_active" => 1, "company_id" => 2, "salary_name" => "Gaji Per Jam"]), "compensation_name" => "Januari 2023", "period" => "2023-01-01", "created_at" => date('Y-m-d H:i:s', time()), "updated_at" => date('Y-m-d H:i:s', time())],
            ["company_id" => "2", "salary" => json_encode(["id" => 3, "is_active" => 1, "company_id" => 2, "salary_name" => "Gaji Komisi"]), "compensation_name" => "Februari 2023", "period" => "2023-02-01", "created_at" => date('Y-m-d H:i:s', time()), "updated_at" => date('Y-m-d H:i:s', time())],
            ["company_id" => "3", "salary" => json_encode(["id" => 4, "is_active" => 1, "company_id" => 3, "salary_name" => "Gaji Variabel"]), "compensation_name" => "Maret 2023", "period" => "2023-03-01", "created_at" => date('Y-m-d H:i:s', time()), "updated_at" => date('Y-m-d H:i:s', time())],
            ["company_id" => "3", "salary" => json_encode(["id" => 5, "is_active" => 1, "company_id" => 3, "salary_name" => "Gaji Kinerja"]), "compensation_name" => "April 2023", "period" => "2023-04-01", "created_at" => date('Y-m-d H:i:s', time()), "updated_at" => date('Y-m-d H:i:s', time())],
        ];

        Compensation::insert($compensation);
    }
}
