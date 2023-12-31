<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Compensation;
use App\Models\EmployeeDetail;
use App\Models\SalaryCompany;
use App\Models\SalaryComponent;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            AdminUserSeeder::class,
            LocationSeeder::class,
            JobGradeSeeder::class,
            DirectoratSeeder::class,
            CompanySeeder::class,
            DivisionSeeder::class,
            SectionSeeder::class,
            PositionSeeder::class,
            EmployeeSeeder::class,
            SalaryComponentSeeder::class,
            SalarySeeder::class,
            SalaryDetailSeeder::class,
            EligibleSeeder::class,
            CompensationSeeder::class,
            EmployeeCompensationSeeder::class,
        ]);
    }
}
