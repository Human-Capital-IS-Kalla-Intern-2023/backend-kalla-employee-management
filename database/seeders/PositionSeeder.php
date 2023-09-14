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
                'position_name' => 'Human Resources Coordinator',
                'company_id' => rand(1, 10),
                'directorat_id' => rand(1, 10),
                'division_id' => rand(1, 5),
                'section_id' => rand(1, 5),
                'job_grade_id' => rand(1, 5),
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'position_name' => 'IT Support Specialist',
                'company_id' => rand(1, 10),
                'directorat_id' => rand(1, 10),
                'division_id' => rand(1, 10),
                'section_id' => rand(1, 10),
                'job_grade_id' => rand(1, 5),
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'position_name' => 'Research Analyst',
                'company_id' => rand(1, 10),
                'directorat_id' => rand(1, 10),
                'division_id' => rand(1, 10),
                'section_id' => rand(1, 10),
                'job_grade_id' => rand(1, 5),
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'position_name' => 'Staff IT',
                'company_id' => rand(1, 10),
                'directorat_id' => rand(1, 10),
                'division_id' => rand(1, 10),
                'section_id' => rand(1, 10),
                'job_grade' => rand(1, 5),
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'position_name' => 'Teknisi',
                'company_id' => rand(1, 10),
                'directorat_id' => rand(1, 10),
                'division_id' => rand(1, 10),
                'section_id' => rand(1, 10),
                'job_grade_id' => rand(1, 5),
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'position_name' => 'Manager',
                'company_id' => rand(1, 10),
                'directorat_id' => rand(1, 10),
                'division_id' => rand(1, 10),
                'section_id' => rand(1, 10),
                'job_grade_id' => rand(1, 5),
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],

        ];

        Position::insert($positions);
    }
}
