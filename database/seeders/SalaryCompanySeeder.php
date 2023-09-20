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
            'company_id' => rand(1,10),
        ]);
        }
    }
}
