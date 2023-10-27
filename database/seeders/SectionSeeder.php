<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Section::factory(10)->create();
        $section = [
            [
                'section_name' => 'UI/UX', 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'section_name' => 'IT Support', 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'section_name' => 'Database', 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'section_name' => 'Marketing', 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'section_name' => 'Mobile Developer', 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'section_name' => 'Big Data Analyst', 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'section_name' => 'Engineering', 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'section_name' => 'System Analyst', 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'section_name' => 'Sales', 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'section_name' => 'Office', 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],

            [
                'section_name' => 'Sales Team', 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'section_name' => 'Marketing Department', 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'section_name' => 'Customer Support Division', 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'section_name' => 'Research and Development Unit', 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'section_name' => 'Human Resources Division', 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'section_name' => 'Finance Department', 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'section_name' => 'Information Technology Team', 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'section_name' => 'Quality Assurance Department', 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'section_name' => 'Legal Affairs Division', 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'section_name' => 'Operations Team', 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            // [
            //     'section_name' => 'Project Management Office','created_at' => date('Y-m-d H:i:s', time()),
            // 'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'section_name' => 'Product Development Section','created_at' => date('Y-m-d H:i:s', time()),
            // 'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'section_name' => 'Logistics Division','created_at' => date('Y-m-d H:i:s', time()),
            // 'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'section_name' => 'Public Relations Team','created_at' => date('Y-m-d H:i:s', time()),
            // 'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'section_name' => 'Facilities Management Department','created_at' => date('Y-m-d H:i:s', time()),
            // 'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'section_name' => 'Training and Development Division','created_at' => date('Y-m-d H:i:s', time()),
            // 'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'section_name' => 'Corporate Communications Section','created_at' => date('Y-m-d H:i:s', time()),
            // 'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'section_name' => 'Customer Experience Team','created_at' => date('Y-m-d H:i:s', time()),
            // 'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'section_name' => 'Safety and Compliance Department','created_at' => date('Y-m-d H:i:s', time()),
            // 'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'section_name' => 'Environmental Affairs Division','created_at' => date('Y-m-d H:i:s', time()),
            // 'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
        ];

        Section::insert($section);
    }
}
