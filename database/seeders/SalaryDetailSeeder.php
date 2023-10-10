<?php

namespace Database\Seeders;

use App\Models\SalaryDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalaryDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $components = [
            [
                'salary_id' => 1,
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
                'salary_id' => 1,
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
                'salary_id' => 1,
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
                'salary_id' => 1,
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
                'salary_id' => 3,
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
                'salary_id' => 2,
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
                'salary_id' => 2,
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
    }
}
