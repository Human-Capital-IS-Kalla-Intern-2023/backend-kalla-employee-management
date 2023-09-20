<?php

namespace Database\Seeders;

use App\Models\SalaryCompany;
use App\Models\SalaryComponent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalaryCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $components = SalaryComponent::all();


        foreach ($components as $component) {
            SalaryCompany::create([
            'component' => $component->component_name,
            'type' => $component->type,
            'is_hide' => $component->is_hide,
            'is_edit' => $component->is_edit,
            'is_active' => $component->is_active,
            'created_at' => $component->created_at,
            'updated_at' => $component->updated_at,
        ]);
        }
    }
}
