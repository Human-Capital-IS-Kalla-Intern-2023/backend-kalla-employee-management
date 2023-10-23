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

        for ($i = 0; $i < 20; $i++) {
            $month = $faker->numberBetween(1, 12); // Angka acak antara 1 dan 12 untuk bulan
            $year = $faker->numberBetween(2000, 2023); // Tahun antara 2000 dan 2023

            // Buat array yang berisi bulan dan tahun
            $period = ['month' => $month, 'year' => $year];

            // Buat instance Compensation dengan data acak
            $compensation = new Compensation();
            $compensation->company_id = rand(1, 10);
            $compensation->salary_id = rand(1, 10);
            $compensation->compensation_name = $faker->date('m_Y');
            $compensation->period = $period;

            $compensation->save();
        }
    }
}
