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
            ['salary_id' => 1, 'order' => 1, 'salary_component_id' => 1, 'component_name' => null, 'type' => 'fixed pay', 'is_hide' => 0, 'is_edit' => 1, 'is_active' => 1,],
            ['salary_id' => 1, 'order' => 2, 'salary_component_id' => 2, 'component_name' => null, 'type' => 'fixed pay', 'is_hide' => 0, 'is_edit' => 1, 'is_active' => 1,],
            ['salary_id' => 1, 'order' => 3, 'salary_component_id' => 3, 'component_name' => null, 'type' => 'fixed pay', 'is_hide' => 0, 'is_edit' => 1, 'is_active' => 1,],
            ['salary_id' => 1, 'order' => 1, 'salary_component_id' => 4, 'component_name' => null, 'type' => 'deductions', 'is_hide' => 0, 'is_edit' => 1, 'is_active' => 1,],

            ['salary_id' => 1, 'order' => 4, 'salary_component_id' => 1, 'component_name' => "Tunjangan Makan", 'type' => 'fixed pay', 'is_hide' => 0, 'is_edit' => 1, 'is_active' => 1,],

            ['salary_id' => 2, 'order' => 1, 'salary_component_id' => 1, 'component_name' => null, 'type' => 'fixed pay', 'is_hide' => 0, 'is_edit' => 1, 'is_active' => 1,],
            ['salary_id' => 2, 'order' => 2, 'salary_component_id' => 2, 'component_name' => null, 'type' => 'fixed pay', 'is_hide' => 0, 'is_edit' => 1, 'is_active' => 1,],
            ['salary_id' => 2, 'order' => 3, 'salary_component_id' => 3, 'component_name' => null, 'type' => 'fixed pay', 'is_hide' => 0, 'is_edit' => 1, 'is_active' => 1,],

            ['salary_id' => 2, 'order' => 4, 'salary_component_id' => null, 'component_name' => 'Tunjangan Makan', 'type' => 'fixed pay', 'is_hide' => 0, 'is_edit' => 1, 'is_active' => 1,],

            ['salary_id' => 2, 'order' => 1, 'salary_component_id' => 4, 'component_name' => null, 'type' => 'deductions', 'is_hide' => 0, 'is_edit' => 1, 'is_active' => 1,],

            ['salary_id' => 2, 'order' => 2, 'salary_component_id' => null, 'component_name' => 'Tunjangan Kesehatan', 'type' => 'deductions', 'is_hide' => 0, 'is_edit' => 1, 'is_active' => 1,],

            ['salary_id' => 3, 'order' => 1, 'salary_component_id' => 1, 'component_name' => null, 'type' => 'fixed pay', 'is_hide' => 0, 'is_edit' => 1, 'is_active' => 1,],
            ['salary_id' => 3, 'order' => 2, 'salary_component_id' => 2, 'component_name' => null, 'type' => 'fixed pay', 'is_hide' => 0, 'is_edit' => 1, 'is_active' => 1,],
            ['salary_id' => 3, 'order' => 3, 'salary_component_id' => 3, 'component_name' => null, 'type' => 'fixed pay', 'is_hide' => 0, 'is_edit' => 1, 'is_active' => 1,],

            ['salary_id' => 5, 'order' => 1, 'salary_component_id' => 1, 'component_name' => null, 'type' => 'fixed pay', 'is_hide' => 0, 'is_edit' => 1, 'is_active' => 1,],
            ['salary_id' => 5, 'order' => 2, 'salary_component_id' => 2, 'component_name' => null, 'type' => 'fixed pay', 'is_hide' => 0, 'is_edit' => 1, 'is_active' => 1,],

            ['salary_id' => 5, 'order' => 3, 'salary_component_id' => null, 'component_name' => 'Tunjangan Makan', 'type' => 'fixed pay', 'is_hide' => 0, 'is_edit' => 1, 'is_active' => 1,],

            ['salary_id' => 5, 'order' => 1, 'salary_component_id' => 4, 'component_name' => null, 'type' => 'deductions', 'is_hide' => 0, 'is_edit' => 1, 'is_active' => 1,],

            ['salary_id' => 5, 'order' => 2, 'salary_component_id' => null, 'component_name' => 'Tunjangan Kesehatan', 'type' => 'fixed pay', 'is_hide' => 0, 'is_edit' => 1, 'is_active' => 1,],

            ['salary_id' => 4, 'order' => 1, 'salary_component_id' => 1, 'component_name' => null, 'type' => 'fixed pay', 'is_hide' => 0, 'is_edit' => 1, 'is_active' => 1,],
            ['salary_id' => 4, 'order' => 2, 'salary_component_id' => 2, 'component_name' => null, 'type' => 'fixed pay', 'is_hide' => 0, 'is_edit' => 1, 'is_active' => 1,],
            ['salary_id' => 4, 'order' => 3, 'salary_component_id' => 3, 'component_name' => null, 'type' => 'fixed pay', 'is_hide' => 0, 'is_edit' => 1, 'is_active' => 1,],

            ['salary_id' => 4, 'order' => 1, 'salary_component_id' => 4, 'component_name' => null, 'type' => 'deductions', 'is_hide' => 0, 'is_edit' => 1, 'is_active' => 1,],

            ['salary_id' => 4, 'order' => 4, 'salary_component_id' => null, 'component_name' => 'Tunjangan Makan', 'type' => 'fixed pay', 'is_hide' => 0, 'is_edit' => 1, 'is_active' => 1,],
            ['salary_id' => 4, 'order' => 2, 'salary_component_id' => null, 'component_name' => 'Tunjangan Kesehatan', 'type' => 'deductions', 'is_hide' => 0, 'is_edit' => 1, 'is_active' => 1,],
        ];

        SalaryDetail::insert($components);



        // foreach (range(1, 20) as $salaryDetail) {
        //     $type = $faker->boolean();

        //     if ($type) {
        //         $value = 'fixed pay';
        //     } else {
        //         $value = 'deductions';
        //     }

        //     SalaryDetail::create([
        //         'salary_id' => rand(1, 10),
        //         'order' => $faker->numberBetween(1, 20),
        //         'component_name' => 'Tunjangan BPJS',
        //         'type' => $value,
        //         'is_edit' => 1,
        //         'is_hide' => 0,
        //         'is_active' => 1,
        //         'created_at' => date('Y-m-d H:i:s', time()),
        //         'updated_at' => date('Y-m-d H:i:s', time()),
        //     ]);
        // }
    }
}
