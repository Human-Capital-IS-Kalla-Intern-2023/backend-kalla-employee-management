<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
     /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = [
            [
                'companies_id' => rand(1, 10),
                'position_name' => 'Human Resources Coordinator',
                'job_grade' => rand(1, 5),
                'directorate' => rand(1, 10),
                'division' => rand(1, 5),
                'section' => rand(1, 5),
                'primary' => rand(0,1),
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'companies_id' => rand(1, 10),
                'position_name' => 'IT Support Specialist',
                'job_grade' => rand(1, 5),
                'directorate' => rand(1, 10),
                'division' => rand(1, 10),
                'section' => rand(1, 10),
                'primary' => rand(0,1),
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'companies_id' => rand(1, 10),
                'position_name' => 'Research Analyst',
                'job_grade' => rand(1, 5),
                'directorate' => rand(1, 10),
                'division' => rand(1, 10),
                'section' => rand(1, 10),
                'primary' => rand(0,1),
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],

        ];

        Position::insert($positions);
    }
}
