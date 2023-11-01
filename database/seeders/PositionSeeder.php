<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = FakerFactory::create();

        $positions = [
            // [
            //     'position_name' => 'Human Resources Coordinator',
            //     'company_id' => rand(1, 10),
            //     'directorat_id' => rand(1, 10),
            //     'division_id' => rand(1, 5),
            //     'section_id' => rand(1, 5),
            //     'job_grade_id' => rand(1, 5),
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'position_name' => 'IT Support Specialist',
            //     'company_id' => rand(1, 10),
            //     'directorat_id' => rand(1, 10),
            //     'division_id' => rand(1, 10),
            //     'section_id' => rand(1, 10),
            //     'job_grade_id' => rand(1, 5),
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'position_name' => 'Research Analyst',
            //     'company_id' => rand(1, 10),
            //     'directorat_id' => rand(1, 10),
            //     'division_id' => rand(1, 10),
            //     'section_id' => rand(1, 10),
            //     'job_grade_id' => rand(1, 5),
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'position_name' => 'Staff IT',
            //     'company_id' => rand(1, 10),
            //     'directorat_id' => rand(1, 10),
            //     'division_id' => rand(1, 10),
            //     'section_id' => rand(1, 10),
            //     'job_grade' => rand(1, 5),
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'position_name' => 'Teknisi',
            //     'company_id' => rand(1, 10),
            //     'directorat_id' => rand(1, 10),
            //     'division_id' => rand(1, 10),
            //     'section_id' => rand(1, 10),
            //     'job_grade_id' => rand(1, 5),
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'position_name' => 'Manager',
            //     'company_id' => rand(1, 10),
            //     'directorat_id' => rand(1, 10),
            //     'division_id' => rand(1, 10),
            //     'section_id' => rand(1, 10),
            //     'job_grade_id' => rand(1, 5),
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],


            [
                'position_name' => 'Software Engineer III',
                'company_id' => 1,
                'directorat_id' => 9,
                'division_id' => 10,
                'section_id' => 4,
                'job_grade_id' => 4, 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'position_name' => 'VP Quality Control',
                'company_id' => 1,
                'directorat_id' => 18,
                'division_id' => 4,
                'section_id' => 19,
                'job_grade_id' => 2, 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'position_name' => 'Registered Nurse',
                'company_id' => 1,
                'directorat_id' => 4,
                'division_id' => 1,
                'section_id' => 11,
                'job_grade_id' => 5, 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'position_name' => 'Chemical Engineer',
                'company_id' => 2,
                'directorat_id' => 14,
                'division_id' => 12,
                'section_id' => 1,
                'job_grade_id' => 1, 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'position_name' => 'Analog Circuit Design manager',
                'company_id' => 2,
                'directorat_id' => 16,
                'division_id' => 20,
                'section_id' => 16,
                'job_grade_id' => 1, 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'position_name' => 'Structural Engineer',
                'company_id' => 2,
                'directorat_id' => 5,
                'division_id' => 13,
                'section_id' => 18,
                'job_grade_id' => 1, 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'position_name' => 'Internal Auditor',
                'company_id' => 3,
                'directorat_id' => 8,
                'division_id' => 17,
                'section_id' => 3,
                'job_grade_id' => 3, 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'position_name' => 'Computer Systems Analyst III',
                'company_id' => 3,
                'directorat_id' => 11,
                'division_id' => 18,
                'section_id' => 20,
                'job_grade_id' => 2, 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'position_name' => 'Dental Hygienist',
                'company_id' => 4,
                'directorat_id' => 14,
                'division_id' => 4,
                'section_id' => 1,
                'job_grade_id' => 1, 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'position_name' => 'Administrative Officer',
                'company_id' => 4,
                'directorat_id' => 7,
                'division_id' => 14,
                'section_id' => 1,
                'job_grade_id' => 5, 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],



            [
                "position_name" => "Pharmacist", "company_id" => "20", "directorat_id" => "2", "division_id" => "13", "section_id" => "17", "job_grade_id" => "3", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                "position_name" => "Financial Analyst", "company_id" => "19", "directorat_id" => "8", "division_id" => "6", "section_id" => "13", "job_grade_id" => "4", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                "position_name" => "Safety Technician II", "company_id" => "15", "directorat_id" => "13", "division_id" => "7", "section_id" => "6", "job_grade_id" => "2", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                "position_name" => "Information Systems Manager", "company_id" => "19", "directorat_id" => "3", "division_id" => "8", "section_id" => "9", "job_grade_id" => "4", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                "position_name" => "Paralegal", "company_id" => "14", "directorat_id" => "7", "division_id" => "20", "section_id" => "15", "job_grade_id" => "2", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                "position_name" => "Database Administrator I", "company_id" => "20", "directorat_id" => "16", "division_id" => "5", "section_id" => "16", "job_grade_id" => "1", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                "position_name" => "Director of Sales", "company_id" => "18", "directorat_id" => "2", "division_id" => "3", "section_id" => "9", "job_grade_id" => "1", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                "position_name" => "Geological Engineer", "company_id" => "13", "directorat_id" => "15", "division_id" => "2", "section_id" => "6", "job_grade_id" => "2", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                "position_name" => "Technical Writer", "company_id" => "13", "directorat_id" => "16", "division_id" => "14", "section_id" => "2", "job_grade_id" => "1", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                "position_name" => "Senior Editor", "company_id" => "20", "directorat_id" => "16", "division_id" => "1", "section_id" => "9", "job_grade_id" => "2", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                "position_name" => "Senior Cost Accountant", "company_id" => "16", "directorat_id" => "20", "division_id" => "16", "section_id" => "7", "job_grade_id" => "3", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                "position_name" => "Help Desk Operator", "company_id" => "18", "directorat_id" => "2", "division_id" => "18", "section_id" => "19", "job_grade_id" => "5", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                "position_name" => "Administrative Assistant I", "company_id" => "19", "directorat_id" => "9", "division_id" => "19", "section_id" => "1", "job_grade_id" => "4", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                "position_name" => "Graphic Designer", "company_id" => "18", "directorat_id" => "14", "division_id" => "2", "section_id" => "12", "job_grade_id" => "3", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                "position_name" => "Account Executive", "company_id" => "12", "directorat_id" => "11", "division_id" => "18", "section_id" => "8", "job_grade_id" => "3", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                "position_name" => "Web Designer II", "company_id" => "15", "directorat_id" => "20", "division_id" => "18", "section_id" => "4", "job_grade_id" => "4", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                "position_name" => "Account Representative II", "company_id" => "13", "directorat_id" => "11", "division_id" => "7", "section_id" => "10", "job_grade_id" => "3", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                "position_name" => "VP Product Management", "company_id" => "14", "directorat_id" => "4", "division_id" => "6", "section_id" => "2", "job_grade_id" => "5", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                "position_name" => "Help Desk Technician", "company_id" => "14", "directorat_id" => "11", "division_id" => "7", "section_id" => "13", "job_grade_id" => "1", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                "position_name" => "Actuary", "company_id" => "17", "directorat_id" => "4", "division_id" => "3", "section_id" => "20", "job_grade_id" => "3", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                "position_name" => "Assistant Manager", "company_id" => "12", "directorat_id" => "8", "division_id" => "15", "section_id" => "2", "job_grade_id" => "5", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                "position_name" => "Developer IV", "company_id" => "18", "directorat_id" => "5", "division_id" => "1", "section_id" => "11", "job_grade_id" => "3", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                "position_name" => "Account Coordinator", "company_id" => "11", "directorat_id" => "12", "division_id" => "9", "section_id" => "5", "job_grade_id" => "4", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                "position_name" => "Tax Accountant", "company_id" => "20", "directorat_id" => "20", "division_id" => "9", "section_id" => "7", "job_grade_id" => "2", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                "position_name" => "Office Assistant III", "company_id" => "11", "directorat_id" => "14", "division_id" => "10", "section_id" => "6", "job_grade_id" => "3", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                "position_name" => "Nuclear Power Engineer", "company_id" => "12", "directorat_id" => "17", "division_id" => "10", "section_id" => "10", "job_grade_id" => "5", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                "position_name" => "Media Manager I", "company_id" => "16", "directorat_id" => "19", "division_id" => "15", "section_id" => "14", "job_grade_id" => "5", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                "position_name" => "Social Worker", "company_id" => "15", "directorat_id" => "11", "division_id" => "8", "section_id" => "11", "job_grade_id" => "3", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                "position_name" => "Accounting Assistant II", "company_id" => "16", "directorat_id" => "11", "division_id" => "2", "section_id" => "11", "job_grade_id" => "2", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                "position_name" => "Human Resources Assistant III", "company_id" => "18", "directorat_id" => "11", "division_id" => "17", "section_id" => "18", "job_grade_id" => "2", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                "position_name" => "Recruiter", "company_id" => "16", "directorat_id" => "3", "division_id" => "11", "section_id" => "16", "job_grade_id" => "4", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                "position_name" => "Occupational Therapist", "company_id" => "12", "directorat_id" => "2", "division_id" => "18", "section_id" => "16", "job_grade_id" => "1", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                "position_name" => "Sales Representative", "company_id" => "17", "directorat_id" => "7", "division_id" => "10", "section_id" => "19", "job_grade_id" => "4", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                "position_name" => "Quality Engineer", "company_id" => "11", "directorat_id" => "4", "division_id" => "12", "section_id" => "5", "job_grade_id" => "3", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                "position_name" => "Design Engineer", "company_id" => "20", "directorat_id" => "5", "division_id" => "6", "section_id" => "16", "job_grade_id" => "3", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                "position_name" => "Sales Associate", "company_id" => "15", "directorat_id" => "1", "division_id" => "4", "section_id" => "8", "job_grade_id" => "5", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                "position_name" => "Health Coach I", "company_id" => "14", "directorat_id" => "4", "division_id" => "3", "section_id" => "4", "job_grade_id" => "1", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                "position_name" => "Environmental Specialist", "company_id" => "16", "directorat_id" => "6", "division_id" => "3", "section_id" => "18", "job_grade_id" => "4", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                "position_name" => "Electrical Engineer", "company_id" => "16", "directorat_id" => "2", "division_id" => "10", "section_id" => "8", "job_grade_id" => "2", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                "position_name" => "Web Developer IV", "company_id" => "16", "directorat_id" => "20", "division_id" => "5", "section_id" => "20", "job_grade_id" => "4", 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],

        ];

        Position::insert($positions);
    }
}
