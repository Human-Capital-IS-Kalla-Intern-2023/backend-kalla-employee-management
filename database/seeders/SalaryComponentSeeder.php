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
                'slug' => 'gaji-pokok',
                'component_name' => 'Gaji Pokok',
                'type' => 'fixed pay',
                'is_hide' => 0,
                'is_edit' => 1,
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'slug' => 'tunjangan-transportasi',
                'component_name' => 'Tunjangan Transportasi',
                'type' => 'fixed pay',
                'is_hide' => 0,
                'is_edit' => 1,
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'slug' => 'tunjangan-komunikasi',
                'component_name' => 'Tunjangan Komunikasi',
                'type' => 'fixed pay',
                'is_hide' => 0,
                'is_edit' => 1,
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'slug' => 'tunjangan-bpjs',
                'component_name' => 'Tunjangan BPJS',
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
