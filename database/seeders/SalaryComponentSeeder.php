<?php

namespace Database\Seeders;

use App\Models\SalaryComponent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalaryComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $components = [
            [
                'component_name' => 'Gaji Pokok',
                'slug' => 'gaji-pokok',
                'type' => 'fixed pay',
                'is_hide' => 0,
                'is_edit' => 1,
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'component_name' => 'Tunjangan Transportasi',
                'slug' => 'tunjangan-transportasi',
                'type' => 'fixed pay',
                'is_hide' => 0,
                'is_edit' => 1,
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'component_name' => 'Tunjangan Komunikasi',
                'slug' => 'tunjangan-komunikasi',
                'type' => 'fixed pay',
                'is_hide' => 0,
                'is_edit' => 1,
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'component_name' => 'Tunjangan BPJS',
                'slug' => 'tunjangan-bpjs',
                'type' => 'deductions',
                'is_hide' => 0,
                'is_edit' => 1,
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
        ];

        SalaryComponent::insert($components);
    }
}
